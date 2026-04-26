<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\ProductivityEntry;
use App\Models\ProductivitySheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardContoller extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $query = Dossier::query();

        // Chef équipe → ses dossiers
        if ($user->isChefEquipe()) {
            $query->where('chef_equipe_id', $user->id);
        }

        // Chef service → tout (pas de filtre)

        $enCirculation = (clone $query)
            ->whereNotIn('statut', ['valide', 'archive'])
            ->count();

        $aControler = (clone $query)
            ->where('statut', 'pre_controle')
            ->count();

        $aValider = (clone $query)
            ->where('statut', 'en_liquidation')
            ->count();

        $avecProbleme = (clone $query)
            ->where('has_issue', true)
            ->where('statut', '!=', 'archive')
            ->count();

        $lastSheets = ProductivitySheet::query()
            ->when($user->isChefEquipe(), function ($query) use ($user) {
                $query->where('team_id', $user->team_id);
            })
            ->withSum('entries as total', 'quantite')
            ->latest('date')
            ->take(4)
            ->get();

        $topAgents = ProductivityEntry::select(
            'agent_id',
            DB::raw('SUM(quantite) as total')
        )
            ->whereHas('sheet', function ($query) use ($user) {
                if ($user->isChefEquipe()) {
                    $query->where('team_id', $user->team_id);
                }
            })
            ->groupBy('agent_id')
            ->orderByDesc('total')
            ->with('agent') // relation vers User
            ->take(3)
            ->get();

        return view('dashboard', compact(
            'enCirculation',
            'aControler',
            'aValider',
            'avecProbleme',
            'topAgents',
            'lastSheets'
        ));
    }


}

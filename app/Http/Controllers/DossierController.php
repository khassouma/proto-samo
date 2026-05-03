<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use App\Models\Dossier;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;


class DossierController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();

        $this->authorize('viewAny', Dossier::class);

        $query = Dossier::where('statut', '!=', 'archive');

        if (!$user->isChefService()) {
            $query->where('chef_equipe_id', $user->id);
        }

        $dossiers = $query->latest('date_reception')->get();



        return view('pages.dossier.index', compact(
            'dossiers',
        ));
    }

    public function archive()
    {
        $user = Auth::user();

        $this->authorize('viewAny', Dossier::class);

        $query = Dossier::where('statut', 'archive');

        if (!$user->isChefService()) {
            $query->where('chef_equipe_id', $user->id);
        }

        $dossiers = $query->get();

        return view('pages.dossier.archive', compact('dossiers'));
    }

    public function add()
    {
        $this->authorize('viewAny', Dossier::class);

        return view('pages.dossier.add');
    }

    public function store(StoreDossierRequest $request)
    {
        $this->authorize('create', Dossier::class);
        $data = $request->validated();
        $data['chef_equipe_id'] = Auth::id();

        Dossier::create([
            'tiers_payant' => $data['tiers_payant'],
            'dg' => $data['dg'],
            'nombre_fiches' => $data['nombre_fiches'],
            'categorie' => $data['categorie'],
            'statut' => 'non_liquide',
            'chef_equipe_id' => Auth::user()->id,
            'type' => $data['type'],
            'date_reception' => now(),
        ]);

        return redirect('/dashboard/dossiers')->with('status', 'le produit a été ajouter');
    }

    public function show(Dossier $dossier)
    {
        $this->authorize('view', $dossier);

        return view('pages.dossier.show', compact('dossier'));
    }

    public function update(UpdateDossierRequest $request, Dossier $dossier)
    {
        $this->authorize('update', $dossier);
        $data = $request->validated();
        $ancienHasIssue = $dossier->has_issue;

        $dossier->tiers_payant = $data['tiers_payant'];
        $dossier->dg = $data['dg'];
        $dossier->nombre_fiches = $data['nombre_fiches'];

        $dossier->type = $data['type'];
        $dossier->categorie = $data['categorie'];

        $dossier->statut = $data['statut'] ?? $dossier->statut;

        $dossier->chef_equipe_id = $data['chef_equipe_id'] ?? $dossier->chef_equipe_id;

        // gestion des issues
        $dossier->has_issue = $data['has_issue'] ?? false;
        $dossier->issue_note = $data['issue_note'] ?? null;
        if ($ancienHasIssue === true && $dossier->has_issue === false) {
            $dossier->issue_resolved_at = now();
        }

        // dates
        if (isset($data['statut']) && $data['statut'] === 'valide') {
            $dossier->statut = 'valide';
            $dossier->date_validation = now();
        } else {
            $dossier->statut = $data['statut'] ?? $dossier->statut;
        }


        $dossier->save();

        return redirect('/dashboard/dossiers/' . $dossier->id)->with('status', 'le dossier a été modifier');
    }

    public function update_view(Dossier $dossier)
    {
        $this->authorize('view', $dossier);
        return view('pages.dossier.update', compact('dossier'));
    }

    public function destroy(Dossier $dossier)
    {
        $this->authorize('delete', $dossier);

        $dossier->update([
            'statut' => 'archive'
        ]);

        return redirect('/dashboard/dossiers')->with('status', 'le dossier a été supprimer');
    }
}

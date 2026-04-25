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

        $dossiers = $query->get();

        return $dossiers;

        // return view('pages.dossier.index', $dossiers);
    }

    public function store(StoreDossierRequest $request)
    {
        $this->authorize('create', Dossier::class);

        $data = $request->validated();
        $data['chef_equipe_id'] = Auth::id();

        return Dossier::create($data);
    }

    public function show(Dossier $dossier)
    {
        $this->authorize('view', $dossier);

        return $dossier;
    }

    public function update(UpdateDossierRequest $request, Dossier $dossier)
    {
        $this->authorize('update', $dossier);

        $data = $request->validated();

        $dossier->update($data);

        return response()->json([
            'message' => 'Dossier mis à jour avec succès',
            'data' => $dossier
        ]);
    }

    public function destroy(Dossier $dossier)
    {
        $this->authorize('delete', $dossier);

        $dossier->update([
            'statut' => 'archive'
        ]);

        return response()->json([
            'message' => 'Dossier archivé'
        ]);
    }
}

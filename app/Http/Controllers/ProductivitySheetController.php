<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductivitySheetRequest;
use App\Http\Requests\UpdateProductivitySheetRequest;
use App\Models\ProductivitySheet;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ProductivitySheetController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', ProductivitySheet::class);

        $user = Auth::user();

        $query = ProductivitySheet::with('team')->latest();

        if (!$user->isChefService()) {
            $query->where('team_id', $user->team_id);
        }

        return $query->get();
    }

    public function show(ProductivitySheet $productivitySheet)
    {
        $this->authorize('view', $productivitySheet);

        return $productivitySheet->load('entries');
    }

    public function store(StoreProductivitySheetRequest $request)
    {
        $this->authorize('create', ProductivitySheet::class);

        $data = $request->validated();

        $data['chef_equipe_id'] =  Auth::user()->id;
        $data['status'] = 'draft';

        return ProductivitySheet::create($data);
    }


    public function update(UpdateProductivitySheetRequest $request, ProductivitySheet $productivitySheet)
    {
        $this->authorize('update', $productivitySheet);

        $data = $request->validated();

        $productivitySheet->update($data);

        return response()->json([
            'message' => 'Feuille mise à jour',
            'data' => $productivitySheet
        ]);
    }

    public function destroy(ProductivitySheet $productivitySheet)
    {
        $this->authorize('delete', $productivitySheet);

        if ($productivitySheet->status === 'validated') {
            abort(403, 'Impossible de supprimer une feuille validée');
        }

        $productivitySheet->update([
            'status' => 'draft' // ou ajouter 'archived' si tu veux
        ]);

        return response()->json([
            'message' => 'Feuille réinitialisée'
        ]);
    }
}

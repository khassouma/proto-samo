<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['productivity_sheet_id', 'agent_id', 'type', 'categorie', 'quantite', 'creer', 'liquider', 'rejeter', 'non_liquide', 'statut_agent'])]
class ProductivityEntry extends Model
{
    /** @use HasFactory<\Database\Factories\ProductivityEntryFactory> */
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function sheet()
    {
        return $this->belongsTo(ProductivitySheet::class, 'productivity_sheet_id');
    }

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}

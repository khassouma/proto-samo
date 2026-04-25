<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['matricule', 'nombre_fiches', 'type', 'categorie', 'chef_equipe_id', 'has_issue', 'issue_note', 'issue_resolved_at', 'non_liquide', 'date_reception', 'date_validation'])]
class Dossier extends Model
{
    /** @use HasFactory<\Database\Factories\DossierFactory> */
    use HasFactory;

    public function entries()
    {
        return $this->hasMany(ProductivityEntry::class);
    }

    public function chefEquipe()
    {
        return $this->belongsTo(User::class, 'chef_equipe_id');
    }
}

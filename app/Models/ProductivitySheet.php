<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['date', 'team_id', 'chef_equipe_id', 'status'])]
class ProductivitySheet extends Model
{
    /** @use HasFactory<\Database\Factories\ProductivitySheetFactory> */
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function entries()
    {
        return $this->hasMany(ProductivityEntry::class);
    }

    public function chefEquipe()
    {
        return $this->belongsTo(User::class, 'chef_equipe_id');
    }
}

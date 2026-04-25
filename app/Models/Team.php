<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['numero'])]

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function sheets()
    {
        return $this->hasMany(ProductivitySheet::class);
    }
}

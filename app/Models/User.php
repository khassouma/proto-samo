<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Database\Factories\UserFactory
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

#[Fillable(['name', 'email', 'password', 'matricule', 'role', 'team_id'])]
#[Hidden(['password', 'two_factor_secret', 'two_factor_recovery_codes', 'remember_token'])]


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    const ROLE_AGENT = 'agent';
    const ROLE_CHEF_EQUIPE = 'chef_equipe';
    const ROLE_CHEF_SERVICE = 'chef_service';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function entries()
    {
        return $this->hasMany(ProductivityEntry::class, 'agent_id');
    }

    public function dossiersAsChef()
    {
        return $this->hasMany(Dossier::class, 'chef_equipe_id');
    }

    public function validatedSheets()
    {
        return $this->hasMany(ProductivitySheet::class, 'chef_equipe_id');
    }

    public function isAgent(): bool
    {
        return $this->role === self::ROLE_AGENT;
    }

    public function isChefEquipe(): bool
    {
        return $this->role === self::ROLE_CHEF_EQUIPE;
    }

    public function isChefService(): bool
    {
        return $this->role === self::ROLE_CHEF_SERVICE;
    }

    public function hasTeam(): bool
    {
        return !is_null($this->team_id);
    }

    public function scopeChefEquipe($query)
    {
        return $query->where('role', 'chef_equipe');
    }

    public function scopeAgent($query)
    {
        return $query->where('role', 'agent');
    }

  
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}

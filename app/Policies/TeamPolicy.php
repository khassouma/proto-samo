<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;

class TeamPolicy
{
    /**
     * Voir la liste des équipes
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['chef_equipe', 'chef_service']);
    }

    /**
     * Voir une équipe
     */
    public function view(User $user, Team $team): bool
    {
        return $user->role === 'chef_service'
            || $user->team_id === $team->id;
    }

    /**
     * Créer une équipe (chef de service uniquement)
     */
    public function create(User $user): bool
    {
        return $user->role === 'chef_service';
    }

    /**
     * Modifier une équipe
     */
    public function update(User $user, Team $team): bool
    {
        return $user->role === 'chef_service'
            || ($user->role === 'chef_equipe' && $user->team_id === $team->id);
    }

    /**
     * Supprimer une équipe
     */
    public function delete(User $user, Team $team): bool
    {
        return $user->role === 'chef_service';
    }

    /**
     * Gérer les membres (ajouter / supprimer)
     */
    public function manageMembers(User $user, Team $team): bool
    {
        return $user->role === 'chef_equipe'
            && $user->team_id === $team->id;
    }
}

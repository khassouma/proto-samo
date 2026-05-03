<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Voir la liste des utilisateurs
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['chef_equipe', 'chef_service']);
    }

    /**
     * Voir un utilisateur
     */
    public function view(User $user, User $model): bool
    {
        // Chef de service → accès total
        if ($user->role === 'chef_service') {
            return true;
        }

        // Chef d’équipe → uniquement ses agents
        return $user->role === 'chef_equipe'
            && $user->team_id === $model->team_id;
    }

    /**
     * Créer un utilisateur
     */
    public function create(User $user): bool
    {
        return $user->role === 'chef_service';
    }

    /**
     * Modifier un utilisateur
     */
    public function update(User $user, User $model): bool
    {
        // Chef de service → tout modifier
        if ($user->role === 'chef_service') {
            return true;
        }

        // Chef d’équipe → uniquement ses agents
        return $user->role === 'chef_equipe'
            && $user->team_id === $model->team_id
            && $model->role === 'agent';
    }

    /**
     * Supprimer un utilisateur
     */
    public function delete(User $user, User $model): bool
    {
        // Chef de service → tout supprimer
        if ($user->role === 'chef_service') {
            return true;
        }

        // Chef d’équipe → uniquement ses agents
        return $user->role === 'chef_equipe'
            && $user->team_id === $model->team_id
            && $model->role === 'agent';
    }
}

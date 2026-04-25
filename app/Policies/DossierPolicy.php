<?php

namespace App\Policies;

use App\Models\Dossier;
use App\Models\User;
// use Illuminate\Auth\Access\Response;

class DossierPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isChefEquipe() || $user->isChefService();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Dossier $dossier): bool
    {
        return $user->isChefService()
            || $dossier->chef_equipe_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isChefEquipe();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Dossier $dossier): bool
    {
        if ($dossier->statut === 'archive') {
            return false;
        }

        return $user->isChefService()
            || $dossier->chef_equipe_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Dossier $dossier): bool
    {
        if ($dossier->statut === 'archive') {
            return false;
        }

        return $dossier->chef_equipe_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Dossier $dossier): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Dossier $dossier): bool
    {
        return false;
    }
}

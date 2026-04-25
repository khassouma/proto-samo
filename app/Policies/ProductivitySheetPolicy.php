<?php

namespace App\Policies;

use App\Models\ProductivitySheet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductivitySheetPolicy
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
    public function view(User $user, ProductivitySheet $sheet): bool
    {
        return $user->isChefService()
            || $sheet->team_id === $user->team_id;
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
    public function update(User $user, ProductivitySheet $sheet): bool
    {
        if ($sheet->status === 'validated') {
            return false;
        }

        return $user->isChefService()
            || $sheet->team_id === $user->team_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProductivitySheet $sheet): bool
    {
        if ($sheet->status === 'validated') {
            return false;
        }

        return $sheet->team_id === $user->team_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProductivitySheet $productivitySheet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProductivitySheet $productivitySheet): bool
    {
        return false;
    }
}

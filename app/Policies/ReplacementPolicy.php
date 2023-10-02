<?php

namespace App\Policies;

use App\Models\Replacement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReplacementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, $replacement): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin && $user->branch->branchable_type == "Store";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, $replacement): bool
    {
        return $user->isAdmin && $user->branch->branchable_type == "Store";
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, $replacement): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, $replacement): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, $replacement): bool
    {
        return false;
    }
}

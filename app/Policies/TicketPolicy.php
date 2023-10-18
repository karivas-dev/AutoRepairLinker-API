<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->branch->branchable_type == "Insurer" || $user->branch->branchable_type == "Garage";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): bool
    {
        return $user->branch->branchable_type == "Insurer" || $user->branch->branchable_type == "Garage";
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->branch->branchable_type == "Insurer";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, $ticket): bool
    {
        return $user->branch->branchable_type == "Insurer" || $user->branch->branchable_type == "Garage";
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, $ticket): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, $ticket): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, $ticket): bool
    {
        return false;
    }
}
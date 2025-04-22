<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlockedDate;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlockedDatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_blocked_date');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BlockedDate $blocked_date): bool
    {
        return $user->can('view_blocked_date');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_blocked_date');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BlockedDate $blocked_date): bool
    {
        return $user->can('update_blocked_date');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BlockedDate $blocked_date): bool
    {
        return $user->can('delete_blocked_date');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_blocked_date');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, BlockedDate $blocked_date): bool
    {
        return $user->can('force_delete_blocked_date');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_blocked_date');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, BlockedDate $blocked_date): bool
    {
        return $user->can('restore_blocked_date');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_blocked_date');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, BlockedDate $blocked_date): bool
    {
        return $user->can('replicate_blocked_date');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_blocked_date');
    }
}

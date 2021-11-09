<?php

namespace App\Policies;

use App\User;
use App\Transfer;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransferPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any transfers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the transfer.
     *
     * @param  \App\User  $user
     * @param  \App\Transfer  $transfer
     * @return mixed
     */
    public function view(User $user, Transfer $transfer)
    {
        //
    }

    /**
     * Determine whether the user can create transfers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->role->name == 'member';
    }

    /**
     * Determine whether the user can update the transfer.
     *
     * @param  \App\User  $user
     * @param  \App\Transfer  $transfer
     * @return mixed
     */
    public function update(User $user, Transfer $transfer)
    {
        //
    }

    /**
     * Determine whether the user can delete the transfer.
     *
     * @param  \App\User  $user
     * @param  \App\Transfer  $transfer
     * @return mixed
     */
    public function delete(User $user, Transfer $transfer)
    {
        //
    }

    /**
     * Determine whether the user can restore the transfer.
     *
     * @param  \App\User  $user
     * @param  \App\Transfer  $transfer
     * @return mixed
     */
    public function restore(User $user, Transfer $transfer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the transfer.
     *
     * @param  \App\User  $user
     * @param  \App\Transfer  $transfer
     * @return mixed
     */
    public function forceDelete(User $user, Transfer $transfer)
    {
        //
    }
}

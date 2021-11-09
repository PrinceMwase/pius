<?php

namespace App\Policies;

use App\User;
use App\Outstation;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class OutstationPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any outstations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the outstation.
     *
     * @param  \App\User  $user
     * @param  \App\Outstation  $outstation
     * @return mixed
     */
    public function view(User $user, Outstation $outstation)
    {
        //
    }

    /**
     * Determine whether the user can create outstations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->role->id == Role::where('name', 'admin')->first()->id;
    }

    /**
     * Determine whether the user can update the outstation.
     *
     * @param  \App\User  $user
     * @param  \App\Outstation  $outstation
     * @return mixed
     */
    public function update(User $user, Outstation $outstation)
    {
        //
    }

    /**
     * Determine whether the user can delete the outstation.
     *
     * @param  \App\User  $user
     * @param  \App\Outstation  $outstation
     * @return mixed
     */
    public function delete(User $user, Outstation $outstation)
    {
        //
    }

    /**
     * Determine whether the user can restore the outstation.
     *
     * @param  \App\User  $user
     * @param  \App\Outstation  $outstation
     * @return mixed
     */
    public function restore(User $user, Outstation $outstation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the outstation.
     *
     * @param  \App\User  $user
     * @param  \App\Outstation  $outstation
     * @return mixed
     */
    public function forceDelete(User $user, Outstation $outstation)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\User;
use App\OutstationLeader;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class OutstationLeaderPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any outstation leaders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the outstation leader.
     *
     * @param  \App\User  $user
     * @param  \App\OutstationLeader  $outstationLeader
     * @return mixed
     */
    public function view(User $user, OutstationLeader $outstationLeader)
    {
        //
    }

    /**
     * Determine whether the user can create outstation leaders.
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
     * Determine whether the user can update the outstation leader.
     *
     * @param  \App\User  $user
     * @param  \App\OutstationLeader  $outstationLeader
     * @return mixed
     */
    public function update(User $user, OutstationLeader $outstationLeader)
    {
        //
    }

    /**
     * Determine whether the user can delete the outstation leader.
     *
     * @param  \App\User  $user
     * @param  \App\OutstationLeader  $outstationLeader
     * @return mixed
     */
    public function delete(User $user, OutstationLeader $outstationLeader)
    {
        //
    }

    /**
     * Determine whether the user can restore the outstation leader.
     *
     * @param  \App\User  $user
     * @param  \App\OutstationLeader  $outstationLeader
     * @return mixed
     */
    public function restore(User $user, OutstationLeader $outstationLeader)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the outstation leader.
     *
     * @param  \App\User  $user
     * @param  \App\OutstationLeader  $outstationLeader
     * @return mixed
     */
    public function forceDelete(User $user, OutstationLeader $outstationLeader)
    {
        //
    }
}

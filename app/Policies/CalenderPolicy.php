<?php

namespace App\Policies;

use App\User;
use App\Calender;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalenderPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any calenders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the calender.
     *
     * @param  \App\User  $user
     * @param  \App\Calender  $calender
     * @return mixed
     */
    public function view(User $user, Calender $calender)
    {
        //
    }

    /**
     * Determine whether the user can create calenders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return ($user->role->name === 'secretary' ||  $user->role->name === 'admin');
    }

    /**
     * Determine whether the user can update the calender.
     *
     * @param  \App\User  $user
     * @param  \App\Calender  $calender
     * @return mixed
     */
    public function update(User $user, Calender $calender)
    {
        //
    }

    /**
     * Determine whether the user can delete the calender.
     *
     * @param  \App\User  $user
     * @param  \App\Calender  $calender
     * @return mixed
     */
    public function delete(User $user, Calender $calender)
    {
        //
    }

    /**
     * Determine whether the user can restore the calender.
     *
     * @param  \App\User  $user
     * @param  \App\Calender  $calender
     * @return mixed
     */
    public function restore(User $user, Calender $calender)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the calender.
     *
     * @param  \App\User  $user
     * @param  \App\Calender  $calender
     * @return mixed
     */
    public function forceDelete(User $user, Calender $calender)
    {
        //
    }
}

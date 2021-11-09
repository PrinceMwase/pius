<?php

namespace App\Policies;

use App\User;
use App\Notification;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any notifications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        // return ($user->role->name === 'secretary' ||  $user->role->name === 'admin');
    }

    /**
     * Determine whether the user can view the notification.
     *
     * @param  \App\User  $user
     * @param  \App\Notification  $notification
     * @return mixed
     */
    public function view(User $user, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can create notifications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return ($user->role->name === 'secretary' || $user->role->name === 'admin');
    }

    /**
     * Determine whether the user can update the notification.
     *
     * @param  \App\User  $user
     * @param  \App\Notification  $notification
     * @return mixed
     */
    public function update(User $user, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can delete the notification.
     *
     * @param  \App\User  $user
     * @param  \App\Notification  $notification
     * @return mixed
     */
    public function delete(User $user, Notification $notification)
    {
        //
        return( $user->id === $notification->notifiable_id  || $user->role->name === 'admin' ); 
    }

    /**
     * Determine whether the user can restore the notification.
     *
     * @param  \App\User  $user
     * @param  \App\Notification  $notification
     * @return mixed
     */
    public function restore(User $user, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the notification.
     *
     * @param  \App\User  $user
     * @param  \App\Notification  $notification
     * @return mixed
     */
    public function forceDelete(User $user, Notification $notification)
    {
        //
    }
}

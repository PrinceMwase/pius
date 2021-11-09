<?php

namespace App\Providers;

use App\Notification;
use App\Policies\BroadcastPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manageAcount', function($user){
            return $user->role->name === 'admin';
        });
        Gate::define('secretary', function($user){
            return $user->role->name === 'secretary';
        });
        Gate::define('treasurer', function($user){
            return $user->role->name === 'treasurer';
        });
        Gate::define('member', function($user){
            return $user->role->name === 'member'  ;
        });
        Gate::define('memberActive', function($user){
            return ($user->role->name === 'member' && $user->status === 'active'  )  ;
        });

        //
    }
}

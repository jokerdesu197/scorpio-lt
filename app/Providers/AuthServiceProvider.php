<?php

namespace App\Providers;

use Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Repositories\User\UserRepositoryInterface;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Models' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(UserRepositoryInterface $user)
    {
        $this->registerPolicies();
        $action = [
            'dash-board' => function() use ($user){
                return Auth::check();
            },
            'user-list' => function() use ($user){
                return $user->hasPermission('user-list');
            },
            'user-create' => function() use ($user){
                return $user->hasPermission('user-create');
            },
            'user-update' => function() use ($user){
                return $user->hasPermission('user-update');
            },
            'user-dalete' => function() use ($user){
                return $user->hasPermission('user-dalete');
            },
            'role-list' => function() use ($user){
                return $user->hasPermission('role-list');
            },
            'role-create' => function() use ($user){
                return $user->hasPermission('role-create');
            },
            'role-update' => function() use ($user){
                return $user->hasPermission('role-update');
            },
            'role-delete' => function() use ($user){
                return $user->hasPermission('role-delete');
            },
            'ACL-create' => function() use ($user){
                return $user->hasPermission('ACL-create');
            },
            'ACL-detail' => function() use ($user){
                return $user->hasPermission('ACL-detail');
            },
            'role-list' => function() use ($user){
                return $user->hasPermission('role-list');
            }
        ];
        foreach ($action as $act => $func) {
            Gate::define($act, $func);
        }
    }
}

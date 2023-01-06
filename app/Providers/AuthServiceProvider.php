<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::before(function ($user){
//            if ($user->Super()) return true;
//        });
//
//        $permissions =Permission::all();
//        foreach ($permissions as $permission)
//        {
//            Gate::define($permission->title , function ($user) use ($permission){
//                return $user->hasPermission($permission);
//            });
//        }
    }
}

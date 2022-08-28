<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

   
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('product_edit', function () {
            // admin & editor
            if(Auth::user()->role_id == 2 || Auth::user()->role_id == 1){
                return true;
            }

        });

        Gate::define('product_delete', function () {
            
            // admin

            if(Auth::user()->role_id == 1){
                return true;
            }

        });


    }
}

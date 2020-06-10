<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Article' => 'App\Policies\ArticlePolicy',
        'App\Tag' => 'App\Policies\TagPolicy',
        'App\Categorie' => 'App\Policies\CategoriePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function($user){
            return $user->role == "admin";
        });

        Gate::define('editeur', function($user){
            return $user->role == "editeur";
        });
    }
}

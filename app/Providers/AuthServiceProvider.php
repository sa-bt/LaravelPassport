<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

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

        Passport::routes();

        Passport::tokensCan([
            'read-tasks' => 'Read all task',
            'add-task' => 'Add new task',
            'edit-task' => 'Edit a task',
            'delete-task' => 'Delete a task',
            'done-tasks' => 'Done a task',
        ]);

        Passport::setDefaultScope([
            'read-tasks'
        ]);

        Passport::cookie('salam_SABT');

    }
}

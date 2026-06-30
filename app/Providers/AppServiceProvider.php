<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', fn (User $user) => $user->esAdmin());
        Gate::define('admin-club', fn (User $user) => $user->esAdminClub());
        Gate::define('admin-club-owner', fn (User $user, $club) => $user->esAdminClub() && $user->club_id === $club->id);
    }
}

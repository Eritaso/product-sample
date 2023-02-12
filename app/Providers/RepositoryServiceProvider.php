<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Domain\Models\IProfileRepository;
use Packages\infrastructure\Repository\ProfileRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProfileRepository::class, ProfileRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

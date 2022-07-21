<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Vote\VoteRepositoryInterface;
use App\Repositories\Vote\VoteRepository;
use App\Interfaces\Option\OptionRepositoryInterface;
use App\Repositories\option\OptionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VoteRepositoryInterface::class, VoteRepository::class);
        $this->app->bind(OptionRepositoryInterface::class, OptionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;


use App\Repositories\LinkRepository;
use App\Repositories\LinkRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
    }

    public function boot(): void
    {

    }
}

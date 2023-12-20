<?php

namespace App\Providers;

use App\Repository\DigimonRepository;
use App\RepositoryInterface\DigimonRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class DigiAppProvider extends ServiceProvider
{
    /**
     * Se crea un bind (union) entre la interface con el repositorio 
     */
    public function register(): void
    {
        $this->app->bind(DigimonRepositoryInterface::class, DigimonRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

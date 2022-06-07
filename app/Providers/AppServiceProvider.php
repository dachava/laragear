<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();//permitir mass assignment, en lugar del prtected fillable
        //Paginator::useBootstrapFive(); Cambia el estilo del pagination, antes de hacer esto hay que hacer publish para obtener los paquetes
    }

}

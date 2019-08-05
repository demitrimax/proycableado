<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\Models\tareas;

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
        //
        Schema::defaultStringLength(191);

        view()->composer('*', function($view)
      {
          if (Auth::check()) {
              $CurrentUserId = Auth::user()->id;
              $currentDate = date('Y-m-d');
              $vartareas = tareas::where('user_id',$CurrentUserId)->where('terminado',null)->get();
              $nuevastareas = tareas::where('created_at', $currentDate)->where('terminado',null)->get();
              $view->with(compact('vartareas','nuevastareas'));

              //View::share('solicitudess',solicitudes::all());
          }else {
              $view->with('vartareas', null);
          }
      });
    }
}

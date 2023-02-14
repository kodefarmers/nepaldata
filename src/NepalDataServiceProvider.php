<?php

namespace KodeFarmers\NepalData;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use KodeFarmers\NepalData\Facades\NepalData;

class NepalDataServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->registerResources();
  }

  public function register()
  {
  }

  /**
   * Register the package resources.
   *
   * @return void
   */
  private function registerResources()
  {
    $this->registerFacades();
    /* $this->registerRoutes(); */
  }

  /**
   * Register the package routes.
   *
   * @return void
   */
  /* protected function registerRoutes() */
  /* { */
  /*   Route::group($this->routeConfiguration(), function () { */
  /*     $this->loadRoutesFrom(__DIR__ . '/../routes/web.php'); */
  /*   }); */
  /* } */

  /**
   * Get the Press route group configuration array.
   *
   * @return array
   */
  /* private function routeConfiguration() */
  /* { */
  /*   return [ */
  /*     'prefix' => NepalData::path(), */
  /*     'namespace' => 'KodeFarmers\NepalData\Http\Controllers', */
  /*   ]; */
  /* } */

  /**
   * Register any bindings to the app.
   *
   * @return void
   */
  protected function registerFacades()
  {
    $this->app->singleton('NepalData', function ($app) {
      return new \KodeFarmers\NepalData\NepalData();
    });
  }
}

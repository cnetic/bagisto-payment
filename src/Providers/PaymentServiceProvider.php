<?php

namespace CNetic\Payment\Providers;

use Illuminate\Support\ServiceProvider;

/**
* Payment service provider
*
* @author    Dariusz Męciński
* @copyright 2019 CNetic Software
*/
class PaymentServiceProvider extends ServiceProvider
{


  /**
   * Bootstrap services.
   *
   * @return void
   */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
      
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
}

<?php

namespace App\Providers;

use App\MyModel\database;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{


    /**
     * 服务提供者加是否延迟加载
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('database',function () {

            return new database();
        });

    }
}

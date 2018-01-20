<?php
/**
 * Created by PhpStorm.
 * User: odeen
 * Date: 2018/1/19
 * Time: 下午3:14
 */
namespace Westery\Baidubce;


use Illuminate\Support\ServiceProvider;

class BceApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/baidubce.php' => config_path('baidubce.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/baidubce.php', 'baidubce'
        );
        $this->app->singleton('BceApi', function ($app) {
            $app = new BceApi(config('baidubce.default'));
            return $app;
        });
    }
}
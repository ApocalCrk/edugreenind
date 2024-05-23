<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Identitas;
use App\Kunjungan;

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
        view()->composer('*',function($view) {
            $view->with('identitas', Identitas::where('id', 1)->FirstorFail());
            Kunjungan::updateorCreate(
                ['ip' => $_SERVER['REMOTE_ADDR'], 'tanggal' => date('Y-m-d'), 'hits' => '1']
            );
        });
    }
}

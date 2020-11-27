<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
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
    public function boot(Charts $charts)
    {
        //
        $charts->register([
            \App\Charts\SampleChart::class,
            \App\Charts\AppointmentChart::class,
            \App\Charts\ReportChart::class,
            \App\Charts\DonationChart::class,
            \App\Charts\PetChart::class,
        ]);

        // date_default_timezone_set('Asia/Manila');
    }
}

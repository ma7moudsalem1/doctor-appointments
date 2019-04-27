<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Appointment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
        
        // Share auth variable.
        view()->composer('*', function($view){
            $user = auth()->user();
            $view->with('auth', $user);
        });

        // Share unseen appointments.
        view()->composer('*', function($view){
            $data = Appointment::whereDoctorSeen(0)->take(7)->get();
            $view->with('newAppointments', $data);
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

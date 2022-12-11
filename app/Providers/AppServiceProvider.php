<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        View::composer('frontend.layouts.header', function ($view) {
            $data['event'] = Event::whereDate('registration_deadline', '>=', now())->whereDate('date', '>=', now())->active()->first();
            $view->with($data);
        });

        try {
            $connection = DB::connection()->getPdo();
            if ($connection){
                $allOptions = [];
                $allOptions['settings'] = Setting::all()->pluck('option_value', 'option_key')->toArray();
                config($allOptions);
            }
        } catch (\Exception $e) {
            //
        }
    }
}

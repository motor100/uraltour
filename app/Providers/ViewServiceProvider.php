<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Auth;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {   
        // Шаблон панели администратора
        view()->composer('dashboard.layout', function ($view)
        {
            // New testimonials
            $testimonials_count = \App\Models\Testimonial::whereNull('publicated_at')->count();

            $view->with('testimonials_count', $testimonials_count);

            // New orders
            // $orders_count = \App\Models\Order::where('status', 'В обработке')->count();

            // $view->with('orders_count', $orders_count);
        });
    }
}

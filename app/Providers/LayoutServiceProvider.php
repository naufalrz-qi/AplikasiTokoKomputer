<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class LayoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $template = 'templates.app.layouts.app'; // Default layout

            if (Auth::check()) {
                switch (Auth::user()->role) {
                    case 'admin':
                        $template = 'templates.admin.layouts.app';
                        break;
                    case 'user':
                        $template = 'templates.user.layouts.app';
                        break;
                }
            }

            $view->with('template', $template);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
        // Menggunakan View Composer untuk semua tampilan
        View::composer('*', function ($view) {
            // Variabel roles dapat diakses di semua tampilan
            $roles = ['admin', 'billing', 'support', 'pm', 'pemilik', 'keuangan', 'finance', 'webmastercustom', 'webmasterbiasa', 'user'];

            // Kirim data ke tampilan
            $view->with('roles', $roles);

            $status = ['active', 'inactive'];

            $view->with('statuses', $status);
        });
    }
}

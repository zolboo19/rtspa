<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Log::error('Hello');

        Broadcast::routes();
        //Broadcast::routes(['midleware' => ['auth:api']]);
        // Broadcast::routes(['midleware' => ['jwt:auth']]);

        require base_path('routes/channels.php');
    }
}

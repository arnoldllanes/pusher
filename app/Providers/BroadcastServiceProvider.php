<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('chat-room-presence.*', function ($user, $roomId) {
            if (true) { // Replace with real authorization
                return [
                    'id' => $user->id,
                    'name' => $user->name
                ];
            }
        });
    }
}

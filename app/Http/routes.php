<?php

use Illuminate\Support\Facades\App;

Route::get('bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Route::controller('notifications', 'NotificationController');

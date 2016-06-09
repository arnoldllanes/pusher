<?php

use Illuminate\Support\Facades\App;
use Vinkla\Pusher\Facades\Pusher;

Route::get('bridge', function() {
   	Pusher::trigger('my-channel', 'my-event', ['message' => 'Hello']);
   	return view('welcome');
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Vinkla\Pusher\Facades\Pusher;

class PushController extends Controller
{
   public function index()
    {
        dd(Pusher::trigger('my-channel', 'my-event', ['message' => 'A']));
        return view('welcome');
    }
}

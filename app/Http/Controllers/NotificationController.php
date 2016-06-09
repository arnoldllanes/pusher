<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
	/**
	* To show a view that lets a user send a notification
	*
	* @var string
	**/
    public function getIndex()
    {
        return view('notification');
    }

    /**
    * To handle a notification request and trigger the notification event
    *
    * @var string
    **/
    public function postNotify(Request $request)
    {
        $notifyText = e($request->input('notify_text'));

        // TODO: Get Pusher instance from service container
       	$pusher = App::make('pusher');

        // TODO: The notification event data should have a property named 'text'
       	$text = $notifyText;
        // TODO: On the 'notifications' channel trigger a 'new-notification' event
    	$pusher->trigger('notifications-channel',
                    'test-event', 
                    array('text' => $notifyText));
    }
}

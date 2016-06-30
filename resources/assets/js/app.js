window.pusher = require('pusher-js');

import Echo from "laravel-echo"

window.echo = new Echo('01d1b869f5167aee3191');

echo.private('chat-room.1')
	.listen('ChatMessageWasReceived', function (data) {
		console.log(data.user, data.chatMessage);
	});
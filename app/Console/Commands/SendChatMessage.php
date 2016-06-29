<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendChatMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send chat message';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Fire off an event, grabbing the first user
        $user = \App\User::first();
        $message = \App\ChatMessage::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);

        event(new \App\Events\ChatMessageWasReceived($message, $user));
    }
}

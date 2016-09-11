<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendChatMessage extends Command
{
    protected $signature = 'chat:message {message}';

    protected $description = 'Send chat message.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
     public function handle()
    {
        $user = \App\User::first();
        $message = \App\ChatMessage::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);

        broadcast(new \App\Events\ChatMessageWasReceived($message, $user))->toOthers();
    }
}

<?php

namespace App\Listeners;

use Laravel\Passport\Events\AccessTokenCreated;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogInfoTokens
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(AccessTokenCreated $event)
    {
        Lof:info('A token was created for client with client id: '.$event->clientId. ' at: '. Carbon::now());

    }
}

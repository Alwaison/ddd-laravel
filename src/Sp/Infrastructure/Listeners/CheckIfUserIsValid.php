<?php


namespace Sp\Infrastructure\Listeners;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Sp\Domain\Events\DomainEvent;

class CheckIfUserIsValid implements ShouldQueue
{

    public function handle(DomainEvent $anEvent)
    {
        Log::debug(serialize($anEvent));
    }

}

<?php


namespace Sp\Infrastructure\Listeners;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Sp\Domain\Events\DomainEvent;

class TraceEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    public $queue = 'debugger';

    public function handle(DomainEvent $anEvent)
    {
        Log::debug(serialize($anEvent));
    }
}

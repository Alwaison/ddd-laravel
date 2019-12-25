<?php

namespace App\Http\Middleware;

use Closure;
use Sp\Domain\Events\DomainEventPublisher;
use Sp\Domain\Events\PersistDomainEventSubscriber;
use Sp\Infrastructure\Persistence\EloquentEventRepository;

class EventListener
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        DomainEventPublisher::instance()->subscribe(
            new PersistDomainEventSubscriber(
                new EloquentEventRepository()
            )
        );

        return $next($request);
    }
}

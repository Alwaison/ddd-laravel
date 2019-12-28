<?php

namespace Sp\Domain\Events;

use Sp\Domain\Events\EventRepository;

class PersistDomainEventSubscriber implements DomainEventSubscriber
{
    private EventRepository $eventRepository;

    public function __construct(EventRepository $anEventRepository)
    {
        $this->eventRepository = $anEventRepository;
    }

    public function handle($aDomainEvent)
    {
        $this->eventRepository->append($aDomainEvent);
    }

    public function isSubscribedTo($aDomainEvent): bool
    {
        return true; // $aDomainEvent instanceof PublishableDomainEvent;
    }
}

<?php

namespace Sp\Domain\Events;

use Sp\Domain\Events\DomainEvent;

interface EventRepository
{
    public function append(DomainEvent $aDomainEvent);
    public function allStoreEventsSince(int $anEventId);
}
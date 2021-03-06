<?php

namespace Sp\Domain\Events;

interface DomainEventSubscriber
{
    public function handle(DomainEvent $aDomainEvent);
    public function isSubscribedTo(DomainEvent $aDomainEvent): bool;
}
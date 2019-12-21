<?php

namespace Sp\Domain\Events;

interface DomainEvent
{
    public function ocurredOn(): \DateTimeImmutable;
}
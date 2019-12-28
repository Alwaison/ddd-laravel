<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserCreated implements DomainEvent
{

    private $occurredOn;
    private $userId;

    public function __construct(UserIdValueObject $aUserId)
    {
        $this->userId = $aUserId->uuid();
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

}

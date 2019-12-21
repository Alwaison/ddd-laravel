<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserCreated implements DomainEvent
{

    private $ocurrendOn;
    private $userId;

    public function __construct(UserIdValueObject $aUserId)
    {
        $this->userId = $aUserId->uuid();
        $this->ocurredOn = new \DateTimeImmutable();
    }

    public function ocurredOn(): \DateTimeImmutable
    {
        return $this->ocurredOn;
    }

}
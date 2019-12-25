<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserLogedIn implements DomainEvent
{
    private $ocurrendOn;
    private $userId;

    public function __construct(UserIdValueObject $aUserId)
    {
        $this->userId = $aUserId->uuid();
        $this->ocurredOn = new \DateTimeImmutable();
        dump($aUserId, "User id created event!");
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function ocurredOn(): \DateTimeImmutable
    {
        return $this->ocurredOn;
    }
    
}

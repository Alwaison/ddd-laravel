<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserCreated implements DomainEvent
{

    protected $ocurrendOn;
    protected $userId;

    public function __constructor(UserIdValueObject $userId)
    {
        $this->userId = $userId->uuid();
        $this->ocurredOn = new DateTime();
    }

    public function ocurredOn(): DateTime
    {
        return $this->ocurredOn;
    }

}
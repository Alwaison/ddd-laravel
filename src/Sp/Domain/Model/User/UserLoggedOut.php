<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserLoggedOut implements DomainEvent
{
    use UserEvent;
}

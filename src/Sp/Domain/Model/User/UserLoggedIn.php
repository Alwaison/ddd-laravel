<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserLoggedIn implements DomainEvent
{
    use UserEvent;
}

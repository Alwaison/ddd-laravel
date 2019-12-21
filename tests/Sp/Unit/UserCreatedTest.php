<?php

namespace Tests\Unit;

use Tests\TestCase;

use Sp\Domain\Model\User\UserCreated;
use Sp\Domain\Model\User\UserIdValueObject;

class UserCreatedTest extends TestCase
{
    /**
     * @test
     */
    public function user_created_event()
    {
        $uuid = UserIdValueObject::create();
        $event = new UserCreated($uuid);
        $this->assertGreaterThan($event->ocurredOn(), new \DateTimeImmutable());
    }

}


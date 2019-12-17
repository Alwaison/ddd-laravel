<?php

namespace Tests\Unit;

use Tests\TestCase;

use Sp\Domain\Model\User\UserCreated;
use Sp\Domain\Model\User\UserIdValueObject;

class UserRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function user_created_event()
    {
        $uuid = UserIdValueObject::create();
        $event = new UserCreated($uuid);
        dd($event);
        //$this->assert('sp_users', ['name' => 'Joan']);
    }

}


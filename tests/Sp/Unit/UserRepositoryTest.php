<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserIdValueObject;
use Sp\Infrastructure\Persistence\EloquentUserRepository;

class UserRepositoryTest extends TestCase
{
    /**
     * 
     * @test
     */
    public function user_save()
    {
        $this->markTestSkipped('We dont make infrastructure tests :P');
        $repository = new EloquentUserRepository();
        $user = User::create('Joan', 'alwaison@gmail.com', '123123');
        $repository->create($user);
        $this->assertDatabaseHas('sp_users', ['name' => 'Joan']);
    }

}

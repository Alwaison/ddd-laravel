<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Domain\User\User;
use Domain\User\UserIdValueObject;
use Infrastructure\Persistence\EloquentUserRepository;

class UserRepositoryTest extends TestCase
{
    /**
     * 
     * @test
     */
    public function user_save()
    {
        $repository = new EloquentUserRepository();
        $user = User::create('Joan', 'email', '123');
        $repository->create($user);
    }

}

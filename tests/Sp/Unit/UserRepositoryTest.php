<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserIdValueObject;
use Sp\Infrastructure\Persistence\EloquentUserRepository;

class UserRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * 
     * @test
     */
    public function user_save()
    {
        $repository = new EloquentUserRepository();
        $user = User::create('Joan', 'email', '123');
        $repository->create($user);
        $this->assertDatabaseHas('sp_users', ['name' => 'Joan']);
    }

}

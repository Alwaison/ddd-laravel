<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserIdValueObject;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function user_id_value_object_has_uuid()
    {
        $userIdValueObject = UserIdValueObject::create('fake-uuid', 'EM11554488');
        $this->assertEquals($userIdValueObject->uuid(), 'fake-uuid');
    }
    
    /**
     * @test
     */
    public function user_id_value_object_has_employee_id()
    {
        $userIdValueObject = UserIdValueObject::create('fake-uuid', 'EM11554488');
        $this->assertEquals($userIdValueObject->employeeId(), 'EM11554488');
    }

    /**
     * @test
     */
    public function user_id_value_object_employeeId_is_string()
    {
        $userIdValueObject = UserIdValueObject::create('fake-uuid', 11554488);
        $this->assertEquals(gettype($userIdValueObject->employeeId()), 'string');
        $this->assertEquals($userIdValueObject->employeeId(), '11554488');
    }

    /** 
     * @test
     */
    public function user_can_get_his_uuid()
    {
        $userIdValueObject = UserIdValueObject::create('fake-uuid', 11554488);
        $user = User::create('Joan', 'email', '123', $userIdValueObject);
        $this->assertEquals($user->uuid(), 'fake-uuid');
    }

    /**
     * @test
     */
    public function user_creates_with_Named_Constructor()
    {
        $userIdValueObject = UserIdValueObject::create('fake-uuid', 11554488);
        $user = User::create('Joan', 'email', '123', $userIdValueObject);
        $this->assertEquals($user->uuid(), 'fake-uuid');
    }


    /**
     * @test
     */
    public function user_creates_with_empty_uuid()
    {
        $user = User::create('Joan', 'email', '123');
        $this->assertEquals($user->name(), 'Joan');
        $this->assertEquals($user->email(), 'email');
        $this->assertTrue($user->isPasswordEquals('123'));
    }
    
    /**
     * @test
     */
    public function user_create_password_token()
    {
        $user = User::create('Joan', 'email', '123');
        $token = $user->createNewPasswordToken();
        $otherToken = $user->createNewPasswordToken();
        $this->assertEquals(strlen($token), 32);
        $this->assertNotEquals($token, $otherToken);
    }
}

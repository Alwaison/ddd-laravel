<?php

namespace Domain\User;

use Domain\User\UserIdValueObject;

final class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    private const TOKEN_PASSWORD_BYTES = 16;

    public static function create(string $name, string $email, string $password, $userIdValueObject = null)
    {
        return new self($name, $email, $password, $userIdValueObject);
    }

    protected function __construct(string $name, string $email, string $password, $userIdValueObject) {
        $this->setId($userIdValueObject ?? UserIdValueObject::create());
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function createNewPasswordToken(): string {
        return bin2hex(random_bytes(self::TOKEN_PASSWORD_BYTES));
    }

    private function setId(UserIdValueObject $userId): void {
        $this->id = $userId;
    }

    private function setName(string $name): void {
        $this->name = $name;
    }

    private function setEmail(string $email): void {
        $this->email = $email;
    }

    private function setPassword(string $password): void {
        $this->password = md5($password);
    }

    public function uuid() {
        return $this->id->uuid();
    }

    public function employeeId() {
        return $this->id->employeeId();
    }

    public function name() {
        return $this->name;
    }

    public function email() {
        return $this->email;
    }
    
    public function password(): string {
        return $this->password;
    }
    public function isPasswordEquals(string $password): bool {
        return $this->password === md5($password);
    }

}

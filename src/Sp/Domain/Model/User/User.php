<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Model\User\UserIdValueObject;
use Sp\Domain\Model\User\UserCreated;

final class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $token;
    protected $tokenValidUntil;
    private const TOKEN_PASSWORD_BYTES = 16;

    public static function create(string $name, string $email, string $password, $userIdValueObject = null): self
    {
        return new self($name, $email, $password, $userIdValueObject);
    }

    protected function __construct(string $name, string $email, string $password, $userIdValueObject)
    {
        $this->setId($userIdValueObject ?? UserIdValueObject::create());
        $this->setName($name);
        $this->setEmail($email);
        $this->setMd5Password($password);
        $this->token = null;
        $this->tokenValidUntil = null;
        
        // new UserCreated($this->id);
    }

    public function hydratate(
        string $aName,
        string $aEmail,
        string $aPassword,
        UserIdValueObject $aUserIdValueObject,
        string $aToken = null,
        \DateTime $aTokenValidUntil = null
    ): void {        
        $this->setId($aUserIdValueObject);
        $this->setName($aName);
        $this->setEmail($aEmail);
        $this->setPassword($aPassword);
        $this->setToken($aToken);
        $this->setTokenValidUntil($aTokenValidUntil);
    }

    public function createNewPasswordToken(): string
    {
        return bin2hex(random_bytes(self::TOKEN_PASSWORD_BYTES));
    }

    private function setId(UserIdValueObject $userId): void
    {
        $this->id = $userId;
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    private function setMd5Password(string $password): void
    {
        $this->password = md5($password);
    }

    private function setPassword(string $password): void 
    {
        $this->password = $password;
    }

    private function setToken(string $aToken = null): void
    {
        $this->token = $aToken;
    }

    private function setTokenValidUntil(\DateTime $date = null): void 
    {
        $this->tokenValidUntil = $date;
    }

    protected function id(): UserIdValueObject
    {
        return $this->id;
    }
    
    public function uuid()
    {
        return $this->id->uuid();
    }

    public function employeeId()
    {
        return $this->id->employeeId();
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }
    
    public function password(): string
    {
        return $this->password;
    }

    public function isPasswordEquals(string $password): bool
    {
        return $this->password === md5($password);
    }

    public function isTokenEquals(string $aToken): bool
    {
        return $this->token === $aToken;
    }

    public function isTokenValid(\DateTime $aDate): bool
    {
        return $this->tokenValidUntil > $aDate;
    }

}

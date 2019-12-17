<?php

Namespace Sp\Domain\Model\User;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserIdValueObjet;

interface UserRepository
{

    public function create(User $user): void;
    // public function remove(User $user);
    // public function userOfId(UserIdValueObject $userIdValueObject): ?User;

}
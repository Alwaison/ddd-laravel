<?php

Namespace Domain\User;

use Domain\User\User;
use Domain\User\UserIdValueObjet;

interface UserRepository
{

    public function create(User $user): void;
    // public function remove(User $user);
    // public function userOfId(UserIdValueObject $userIdValueObject): ?User;

}
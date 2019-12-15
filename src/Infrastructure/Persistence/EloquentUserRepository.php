<?php

Namespace Infrastructure\Persistence;

use Domain\User\User;
use Domain\User\UserRepository;
use Infrastructure\Persistence\Eloquent\UserEloquentModel;

class EloquentUserRepository implements UserRepository
{

    public function create(User $user): void {
        $userData = [
            'id' => $user->uuid(),
            'employee_id' => $user->employeeId(),
            'name' => $user->name(),
            'email' => $user->email(),
            'password' => $user->password()
        ];
        $model = new UserEloquentModel($userData);
        $model->save();
    }

    // public function remove(User $user) {
    //     return null;
    // }

    // public function userOfId(UserIdValueObject $userIdValueObject): ?User {
    //     return null;
    // }

}
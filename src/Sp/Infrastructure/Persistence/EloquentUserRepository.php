<?php

namespace Sp\Infrastructure\Persistence;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserIdValueObject;
use Sp\Domain\Model\User\UserRepository;
use Sp\Domain\Model\User\UserNotFoundInDatabaseException;
use Sp\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use Doctrine\Instantiator\Instantiator;

class EloquentUserRepository implements UserRepository
{

    public function create(User $user): void
    {
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

    public function userExists(String $userEmail, String $userPassword): ?User
    {
        $model = new UserEloquentModel();
        $result = $model->where('email', $userEmail)
                        ->where('password', md5($userPassword))
                        ->get();
        if (!$result->count()) {
            throw new UserNotFoundInDatabaseException('User not found in system');
        }
        return $this->createNewInstanceOfUser($result->first());
    }

    protected function createNewInstanceOfUser($userModel): User
    {
        $instantiator = new Instantiator();
        $user = $instantiator->instantiate(User::class);
        $user->hydratate(
            $userModel->name,
            $userModel->email,
            $userModel->password,
            UserIdValueObject::create($userModel->id, $userModel->employee_id),
            $userModel->token,
            $userModel->tokenValidUntil
        );
        return $user;
    }

}

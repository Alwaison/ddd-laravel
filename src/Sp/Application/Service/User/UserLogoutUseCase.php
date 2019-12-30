<?php


namespace Sp\Application\Service\User;

use Illuminate\Support\Facades\Session;
use Sp\Domain\Model\User\UserLoggedOut;
use Sp\Domain\Service\UseCase;

class UserLogoutUseCase implements UseCase
{

    public function execute()
    {
        $user = Session::get('userLogged');
        event(new UserLoggedOut($user->id()));
        Session::flush();
    }
}

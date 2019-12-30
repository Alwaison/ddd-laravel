<?php


namespace Sp\Application\Service\User;

use Illuminate\Support\Facades\Session;
use Sp\Domain\Service\UseCase;

class UserLogoutUseCase implements UseCase
{

    public function execute()
    {
        Session::flush();
    }
}

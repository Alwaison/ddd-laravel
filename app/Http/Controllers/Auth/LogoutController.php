<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sp\Application\Service\User\UserLogoutUseCase;

class LogoutController extends Controller
{
    protected string $redirectTo = '/login';

    public function logout()
    {
        $logout = new UserLogoutUseCase();
        $logout->execute();

        return redirect($this->redirectTo);
    }
}

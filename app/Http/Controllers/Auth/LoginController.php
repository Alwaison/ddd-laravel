<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Sp\Application\Service\User\UserLoginUseCase;
use Sp\Infrastructure\Persistence\EloquentUserRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if(Session::get('userLogged') !== null) {
            return redirect($this->redirectTo);
        }
        return view('login.index');
    }

    public function login(Request $request, EloquentUserRepository $userRepository)
    {
        $userEmail = $request->input('userEmail');
        $userPassword = $request->input('password');
        $userLoginUseCase = new UserLoginUseCase($userEmail, $userPassword, $userRepository);
        try {
            $user = $userLoginUseCase->execute();
            Session::put([
                'userLogged' => $user
            ]);
            return redirect($this->redirectTo);
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }
}

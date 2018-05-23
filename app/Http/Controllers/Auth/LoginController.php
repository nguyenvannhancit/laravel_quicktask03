<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/task';

    public function username ()
    {
        return 'username';
    }

    public function showLoginForm ()
    {
        return view('auth.login');
    }

    public function Login (LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {

            return redirect()->action('TaskController@index')->with(['messages' => 'login.success']);
        } else {
            return redirect()->route('login')->with(['messages' => 'login.fail']);
        }
    }

    public function logout ()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}

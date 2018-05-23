<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct ()
    {
        $this->middleware('guest');
    }

    public function getRegister ()
    {
        return view('auth.register');
    }

    public function postRegister (RegisterRequest $request)
    {
        $register = new User;
        $register->name = $request->name;
        $register->username = $request->username;
        $register->password = bcrypt($request->password);
        $register->email = $request->email;
        $register->role = $request->role;
        $register->save();

        return redirect()->route('showloginform');
    }
}


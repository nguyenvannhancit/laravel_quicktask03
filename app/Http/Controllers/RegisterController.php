<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
class RegisterController extends Controller
{
    public function index ()
    {
        return view('auth.register');
    }

    public function store (RegisterRequest $request)
    {
        $data = new User;
        $data->create($request->all());

        return redirect()->route('showloginform')->with(['messages' => trans('registeruser.add_complete')]);
    }
}

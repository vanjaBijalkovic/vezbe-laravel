<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register() 
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) 
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        info($user);

        return redirect('/');

    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(LoginRequest $request) 
    {
        $credentials = $request->validated();
        if (auth()->attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors([
            'message' => 'Incorrect!'
        ]);
    }
}

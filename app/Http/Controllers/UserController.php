<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'confirmed'],
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        auth()->guard()->login($user);
        return redirect('/');
    }

    public function logout(Request $request){
        auth()->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5'],
        ]);

        if (auth()->guard()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}

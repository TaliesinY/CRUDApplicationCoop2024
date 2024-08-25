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

        auth()->login($user);

        return redirect('/');
    }
}

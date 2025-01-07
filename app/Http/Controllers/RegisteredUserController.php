<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users', 'max:254'],
            'password' => ['required', Password::min(5)->letters()->numbers(), 'confirmed'], // password_confirmation
        ]);

        // create user
        $user = User::create($attributes);
        
        // login
        Auth::login($user);

        // redirect
        return redirect('/jobs');
    }
}

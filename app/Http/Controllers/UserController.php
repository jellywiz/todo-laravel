<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $formValidation = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        $formValidation['password'] = bcrypt($formValidation['password']);
        $user = User::create($formValidation);
        auth()->login($user);
        return redirect('/');
    }
    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $formValidation = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (auth()->attempt($formValidation)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }
}

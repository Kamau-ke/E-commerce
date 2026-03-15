<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
  
    public function showRegister()
    {
        //
        return view('register');
    }

   
    public function register(Request $request)
    {
        //

        $validated=$request->validate([
            'name'=>'required|min:3|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);

        // if(!$validated){
        //     return redirect()->back()->with('errors');
        // }

       $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password)
       ]);

        Auth::login($user);

        return redirect()->route('home')->with('email', 'Account created successfully');


    }

  

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        $credentials=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'message'=>'Invalid credentials'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    
}

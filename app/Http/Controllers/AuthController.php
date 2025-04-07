<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin(){
        return view('auth.login');
    }

    public function signup(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        $user->assignRole($request->role);
        
        return redirect()->route('signin')->with('success', 'User created successfully');
    }
    
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = Auth::attempt($request->only('email', 'password'));
        if (!$credentials) {
            return redirect()->back()->withErrors(['Invalid credentials']);
        }

        Auth::user();

        return redirect()->route('siswa');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('signin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewRegister(){
        return view('/register');
    }

    public function register(Request $request){
        $input = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|max:12|min:4',
        ]);
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect('/login');
    }

    public function viewLogin(){
        return view('/login');
    }

    public function login(Request $request){
        $input = $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        $current_page = 1;
        if(Auth::attempt($input, $request->filled('remember_token'))){
            $request->session()->regenerate();
            return redirect()->intended('home/'.$current_page);
        }
        
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records',
            'password' => 'The provided credentials do not match our records',
        ])->onlyInput('email', 'remember_token');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

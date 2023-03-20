<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    public function authenticate(Request $request): RedirectResponse
    {       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            //dd(Auth::user()->type);
            $request->session()->regenerate(); 
            //if(Auth::user()->type==1){
                return redirect()->intended('admin/dashboard/newprojects');
            //}
        }
        return back()->with('message', 'The provided credentials do not match our records.');
    }
    public function logout(){
        Auth::logout();
        return Redirect('/');
    }
}

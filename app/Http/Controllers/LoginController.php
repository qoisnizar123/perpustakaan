<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('login.index');
    }

    public function register(Request $request)
    {
        return view('register.index');
    }

    public function autenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if  (Auth::attempt($credentials)) {
            
            if(Auth::user()->status != 'aktif') {
                session::flash('status', 'Gagal');
                session::flash('message', 'Akun anda belum aktif, silahkan hubungi admin');
                return redirect('/login');
            }
            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');
        }

        session::flash('status', 'Gagal');
        session::flash('message', 'login gagal');
        return redirect('/login');
    }
}
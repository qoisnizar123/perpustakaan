<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Session};

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('register.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if (!Auth::attempt($credentials)) {
            return $this->failedLogin();
        }

        if (Auth::user()->status != 'aktif') {
            Auth::logout();
            $request->session()->invalidate();
            return $this->inactiveAccount();
        }

        $request->session()->regenerate();
        return redirect(Auth::user()->role_id == 1 ? '/dashboard' : '/profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'no_telepon' => 'required|max:255',
            'alamat' => 'required'
        ]);

        User::create([
            ...$request->all(),
            'password' => Hash::make($request->password)
        ]);

        return $this->registrationSuccess();
    }

    public function failedLogin()
    {
        Session::flash('status', 'Gagal');
        Session::flash('message', 'Login gagal');
        return redirect('/login');
    }

    public function inactiveAccount()
    {
        Session::flash('status', 'Gagal');
        Session::flash('message', 'Login gagal. Akun anda belum aktif, silahkan tunggu persetujuan admin');
        return redirect('/login');
    }

    public function registrationSuccess()
    {
        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Pendaftaran berhasil. Tunggu persetujuan admin');
        return redirect('/register');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getViewUser()
    {
        $title = 'User';
        $data = User::get();
        return view('backend.auth.__user', compact('title', 'data'));
    }
    public function getViewLogin()
    {
        $title = 'login';
        return view('backend.auth.login', compact('title'));
    }
    public function simpan(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if (Auth::attempt(['email' => $user->email, 'password' => $user->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect('/user');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        };
        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
            'password' => 'Password salah'
        ])->onlyInput('email', 'password');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

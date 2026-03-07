<?php
declare(strict_types=1);

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.reg');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function forgotPage()
    {
        return view('auth.partials.forgot');
    }

    public function login(Request $r)
    {
        $credentials = $r->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)) {
            $r->session()->regenerate();
            return redirect('/worm');
        }

        return back()->withErrors(['email'=>'Неверные данные']);
    }

    public function register(Request $r)
    {
        $data = $r->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);

        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);

        Auth::login($user);

        return redirect('/worm');
    }

    public function forgot(Request $r)
    {
        $r->validate(['email'=>'required|email']);

        Password::sendResetLink($r->only('email'));

        return view('auth.partials.forgot_sent');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

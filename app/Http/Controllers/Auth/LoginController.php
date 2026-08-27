<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ================= SHOW LOGIN =================

    public function showLogin()
    {
        return view('login');
    }


    // ================= LOGIN =================

    public function login(Request $request)
    {
        // Validate
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);


        // Remember me
        $remember = $request->boolean('remember');


        // Attempt login
        if (Auth::attempt($credentials, $remember)) {

            // Regenerate session
            $request->session()->regenerate();

            return redirect()
                ->intended(route('index'));
        }


        // Login failed
        return back()
            ->withErrors([
                'email' => 'Incorrect email or password.',
            ])
            ->withInput($request->only('email'));
    }


    // ================= LOGOUT =================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('index');
    }
}

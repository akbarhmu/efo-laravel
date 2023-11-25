<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(UserRegisterRequest $request): RedirectResponse
    {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->nik = $request->nik;
        $newUser->email = $request->email;
        $newUser->birth_date = $request->birth_date;
        $newUser->password = Hash::make($request->password);

        DB::beginTransaction();
        try {
            $newUser->save();
            event(new Registered($newUser));
            Auth::login($newUser);
            DB::commit();

            return redirect()->route('verification.notice');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);

            return back()->withErrors('error', __('Server Error'))->withInput();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

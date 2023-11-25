<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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
}

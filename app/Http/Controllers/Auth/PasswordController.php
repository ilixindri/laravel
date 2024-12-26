<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // dd($request->validateWithBag);
        // dd($request->user());
        // dd($request->user()->pass);
        dd('CURRENT_PASSWORD', $request->current_password, Hash::check($request->current_password, $request->user()->pass), 'PASSWORD', $request->password, Hash::check($request->password, User::find(48)->pass));
        // dd(Hash::check('123qweQWE!@#', User::find(48)->pass));
        // dd(Hash::check('123qweQWE!@#1', $request->user()->pass));

        if (Auth::check()) {
            // dd('ok');
        }
        if ($request->user()->pass) {
            // dd('ok');
        }

        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {

        // }
        if (Hash::check($request->current_password, $request->user()->pass)) {
            $validated = $request->validateWithBag('updatePassword', [
                // 'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);

            // dd(Hash::make($validated['password']));

            $request->user()->update([
                'pass' => Hash::make($validated['password']),
            ]);

            return back()->with('status', 'password-updated');
        }

    }
}

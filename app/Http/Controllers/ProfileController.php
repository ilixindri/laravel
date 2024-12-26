<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Create the user's profile form.
     */
    public function create()
    {
        $user = new User();
        $user->name = 'Convidado';
        $user->save();
        return response()->json($user);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = User::find($request->_id);
        Auth::login($user);
        if (Auth::check()) {
            // dd($user);
        }
        return view('profile.edit', [
            'user' => $user, 'modules' => ['profile'], 'components' => ['profile']
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function put(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::find($request->_id);
        dd($request->user());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

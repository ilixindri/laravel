<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Controllers\Auth\EmailVerificationPromptController;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function pass(): View
    {
        return view('auth.signin.pass.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
	
	public function passTransfer(Request $request)
	{
		if (Auth::check()) {
			return redirect('/signin/new');
		}
        if ($request->has('pass')) {
			$pass = $request->input('pass');
		} else if ($request->cookie('pass')) {
			$pass = $request->cookie('pass');
		} else {
			return redirect('/signin/pass/register')->with('message', __('Send One Password'))->withErrors(['pass'])->withInput();
		}
		if ($request->has('remember')) {
			$remember = $request->input('remember');
		} else if ($request->cookie('remember')) {
			$remember = $request->cookie('remember');
		} else {
			$remember = False;
		}
		$user = User::where('mail', session('mail'))->first();
		if ($user) {
			$request->user = $user;
			return (new EmailVerificationPromptController())($request);
		}
		else {
			$user = new User();
			$user->mail = session('mail');
			$user->save();
			$request->user = $user;
			(new EmailVerificationPromptController())($request);
		}
		$user->pass = Hash::make($pass);
		$user->save();
        Auth::login($user);
		return redirect('/dashboard');
	}
}

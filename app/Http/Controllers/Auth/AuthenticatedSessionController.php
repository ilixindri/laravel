<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
	public function create(): View
	{
		//return view('auth.join');
		return view('auth.signin.pass.auth');
	}
    public function mail(Request $request)
    {
        return view('auth.signin.mail');
    }
    public function pass(Request $request)
    {
        return view('auth.signin.pass.auth');
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

	public function mailTransfer(Request $request)
    {
		if (Auth::check()) {
			return redirect('/signin/new');
		}
        if ($request->has('mail')) {
			if (filter_var($request->input('mail'), FILTER_VALIDATE_EMAIL)) {
				$mail = $request->input('mail');
				session(['mail' => $mail]);
				$cookie = Cookie::forever('mail', $mail);
			} else {
				return redirect('/signin/mail')->with('message', __('Send One Mail'))->withErrors(['mail'])->withInput();
			}
		} else if (filter_var($request->cookie('mail'), FILTER_VALIDATE_EMAIL)) {
			$mail = $request->cookie('mail');
			session(['mail' => $mail]);
		} else if (session('mail')) {
			$mail = session('mail');
			$cookie = Cookie::forever('mail', $mail);
		} else {
			return redirect('/signin/mail')->with('message', __('Send One Mail'))->withErrors(['mail'])->withInput();
		}
		$user = User::where('mail', $mail)->first();
		if ($user) {
			return redirect('/signin/pass/auth')->cookie($cookie);
		}
		else {
			return redirect('/signin/pass/register')->cookie($cookie);
		}
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
			return redirect('/signin/pass/auth')->with('message', __('Send One Password'))->withErrors(['pass'])->withInput();
		}
		if ($request->has('remember')) {
			$remember = $request->input('remember');
		} else if ($request->cookie('remember')) {
			$remember = $request->cookie('remember');
		} else {
			$remember = False;
		}
		$user = User::where('mail', session('mail'))->where('pass', Hash::make($pass))->first();
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
		return redirect('/dashboard');
	}
}
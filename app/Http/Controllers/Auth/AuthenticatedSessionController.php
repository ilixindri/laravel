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

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.join');
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

    public function join(Request $request)
    {
        if ($request->has('mail')) {
            $mail = $request->input('mail');
            if (filter_var($cookie, FILTER_VALIDATE_EMAIL)) {}
            else {
                return redirect('/join/mail')->withErrors(['mail'])->withInput();
            }
            $cookie = $request->cookie('mail');
            if ($cookie) {
                if (filter_var($cookie, FILTER_VALIDATE_EMAIL)) {
                    $session = session('mail');
                    if($session) {
                        if($session == $mail) {
                            $cookie = Cookie::forever('mail', $mail);
                            return redirect('/dashboard')->cookie($cookie);
                        } else {
                            session(['mail', $mail]);
                            $cookie = Cookie::forever('mail', $mail);
                            return redirect('/dashboard')->cookie($cookie);
                        }
                    } else {
    
                    }
                    if($mail == $cookie) {
                        return redirect('/join/pass')->cookie();
                    }
                } else {
                    
                }
            } else {
                $session = session('mail');
                if($session) {
                    if($session == $mail) {
                        $cookie = Cookie::forever('mail', $mail);
                        return redirect('/dashboard')->cookie($cookie);
                    } else {
                        session(['mail', $mail]);
                        $cookie = Cookie::forever('mail', $mail);
                        return redirect('/dashboard')->cookie($cookie);
                    }
                } else {

                }
                $cookie = Cookie::forever('mail', mail);
                return redirect('/join/pass')->cookie($cookie);
            }
        }
        $mail = $request->cookie('mail');
        if ($mail) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          
            } else {

            }
        } else {
            return redirect('/join/mail');
        }
        dd($request);
    }
    public function mail(Request $request)
    {
        return view('auth.mail');
    }
}

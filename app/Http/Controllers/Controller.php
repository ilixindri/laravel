<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
	public function dashboard(Request $request): View
    {
        return view('dashboard', );
    }

	public function welcome(Request $request): View
    {
        return view('welcome', ['modules' => ['welcome']]);
    }
}

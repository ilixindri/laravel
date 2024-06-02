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
	public function LoadING(Request $request, $NextRoute = null): View
    {
        if ($NextRoute !== null) {
            dd();
            return view('LoadING', ['NextRoute' => $NextRoute]);
        }
        dd();
        return view('LoadING', ['NextRoute' => $NextRoute]);
    }
	public function load0(Request $request, $next = null)
    {
        return '0';
    }
	public function load1(Request $request, $next)
    {
        return '2';
    }
	public function load2($request, $next)
    {
        return '3';
    }
	public function load3($next)
    {
        return '4';
    }
	public function load4()
    {
        return '5';
    }
}

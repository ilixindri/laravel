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
            return view('LoadING', ['NextRoute' => $NextRoute]);
        }
        return view('LoadING', ['NextRoute' => $NextRoute]);
    }
}

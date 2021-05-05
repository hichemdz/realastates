<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tetsController extends Controller
{
    public function index (Request $re)
    { 
        return __('erorr.incorrect');
    }

    public function login(Request $re)
    {
    	# code...
    }
}

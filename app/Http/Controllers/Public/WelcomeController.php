<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {

        return view('public.welcome');
    }
}

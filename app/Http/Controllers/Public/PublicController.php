<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function scholarships()
    {
        return view('public.scholarships');
    }

    public function announcements()
    {
        return view('public.announcements');
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function eligibility()
    {
        return view('public.eligibility');
    }
}

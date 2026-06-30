<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function categories(): View
    {
        return view('pages.categories');
    }

    public function analytics(): View
    {
        return view('pages.analytics');
    }

    public function settings(): View
    {
        return view('pages.settings');
    }
}

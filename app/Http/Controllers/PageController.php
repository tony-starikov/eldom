<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function changeLocale($locale = 'en')
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function main()
    {
        $page_info = Page::where('name', 'main')->first();

        return view('main', compact('page_info'));
    }
}

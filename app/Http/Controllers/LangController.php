<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{


    public function change(Request $request)
    {
        App::setLocale($request->app);
        session()->put('locale', $request->app);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;
use function Symfony\Component\Finder\name;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.auth.login');
    }

    public function doLogin(Request $request)
    {
        $credantial = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
       $login =Auth::attempt($credantial);
       if ($login){
           return redirect()->route('dashboard');
       }else{
           \Illuminate\Support\Facades\Session::flash('faild', 'Login Failed');
           return redirect()->back();
       }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

//        $login = Auth::attempt($credantial);
//        if ($login){
//            return redirect()->route('dashboard');
//        }else{
//           \Illuminate\Support\Facades\Session::flash('failed', 'Login Failed');
//            return redirect()->back();
//        }
//    }

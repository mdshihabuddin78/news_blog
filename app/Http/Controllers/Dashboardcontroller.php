<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function dashboard()
    {
        return view("backend.dashboard");
    }



    public function news()
    {
        return view("backend.news");
    }
    public function news_fit()
    {
        return view("backend.News_Fit");
    }
//    public function contact(){
//        return view("backend.Contact");
//    }
    public function widgets(){
        return view("backend.widgets");
    }
    public function charts(){
        return view("backend.Charts");
    }
    public function subminu(){
        return view("backend.Subminu");
    }
    public function subminu2(){
        return view("backend.Subminu2");
    }

    public function Tasks(){
        return view("backend.Tasks");
    }
    public function Login(){
        return view("backend.Login");
    }
    public function Calender(){
        return view("backend.Calender");
    }
//    public function contact(){
//        return view("backend.Contact");
//    }

}

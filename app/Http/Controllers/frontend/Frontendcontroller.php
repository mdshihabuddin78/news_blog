<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Frontendcontroller extends Controller
{
    public function index()
    {
//        $data['slides'] = News::with('category:category_name,id')->take(4)->skip(0)->get();
        $data['slides'] = News::orderBy('date', 'desc')->take(4)->skip(0)->get();

//        $data['slider'] = News::with('category:category_name,id')->take(5)->skip(0)->get();
        $data['slider'] = News::orderBy('date', 'desc')->take(5)->skip(0)->get();
        $data['news'] = News::orderBy('date', 'desc')->take(4)->skip(0)->get();
//        $data['content_2'] = News::take(2)->skip(2)->get();
        $data['slaide'] = News::orderBy('date', 'desc')->take(4)->skip(0)->get();
        $data['Slaider'] = News::orderBy('date', 'desc')->take(4)->skip(0)->get();
        $data['right_slaider'] = News::orderBy('date', 'desc')->take(4)->skip(0)->get();
        $data['footer_photo'] = News::orderBy('date', 'desc')->take(6)->skip(0)->get();
        $data['latestNews'] = News::orderBy('id', 'DESC')->paginate(4);
//        $data['$treading'] = News::take(4)->skip(0)->get();
        $data['categories'] = category::all();

        return view('homepage', $data);
    }

    public function webCategory($cateId)
    {
        $category = category::find($cateId);
        $data['category'] = $category;
        $data['news'] = News::with('author:name,id')->where('category_id', $cateId)->paginate(2);
        $data['categories'] = category::all();
        $data['footer_photo'] = News::take(6)->skip(0)->get();

        return view('category', $data);

    }


    public function newsDetails($newsId)
    {
        News::find($newsId)->increment('view_count');
        $data['news'] = News::with('author:name,id', 'category:category_name,id')->where('id', $newsId)->first();
        $data['categories'] = category::all();
        $data['treadingNews'] = News::where('treading',0)->take(5)->get();
        $data['footer_photo'] = News::take(6)->skip(0)->get();
        $data['comments'] = comment::where('post', $newsId)->orderBy('id', 'DESC')->take(5)->get();
        $data['comment_count'] = comment::where('post', $newsId)->count();
        return view('news_details', $data);
    }
}
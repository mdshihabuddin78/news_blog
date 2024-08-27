<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\Finder\name;
use function Symfony\Component\Mime\Header\all;

class NewsController extends Controller
{


    public function index()
    {
        $data['news'] = News::join('users', 'news.created_by', '=', 'users.id')->select('news.*', 'users.name as user_name')->paginate(5);


        return view('backend.news.newsList', $data);
    }





    public function create()
    {
        $data['categories'] = category::where('status', 1)->get();
        return view('backend.news.newsCreate',$data);
    }


    public function store(Request $request)
    {


        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'details' => 'required',
            'thumbnail' => 'required'
        ]);
        $imageName = '';
        if ($image = $request->file('thumbnail')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('uploads'), $imageName);
        }


        $input = $request->except('_token');

        $news = new News();
        $news->fill($input);
        $news->date = date('Y-m-d');
        $news->created_by = auth()->user()->id;
        $news->thumbnail = $imageName;
        $news->treading = 0;
        $news->view_count = 0;
        $news->save();


        Session::flash('success', 'Successfully Inserted');

        return redirect()->back();

    }



    public function show($id)
    {
        //
    }

    public function edit($id)
    {
//        $news = News::find($id);
//        $news = category::find($id);
        $news['news'] = News::where('id', $id)->first();
        $news['categories'] = category::where('status', 1)->get();
        return view('backend.news.newsEdit', $news);

//        if ($news) {
//            return view('backend.news.newsEdit', compact('news'));
//        }
//
//        return redirect()->route('news.index')->with('error', 'News not found.');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'details' => 'required',
            'thumbnail' => '',
        ]);

        $news = News::findOrFail($id);
        if ($news){
            $imageName = null;
            if ($image = $request->file('thumbnail')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(storage_path('uploads'), $imageName);
            }

            $news->fill($request->all());
            $news->thumbnail=$imageName ?? $news->thumbnail;
            $news->save();
        }


        Session::flash('success', 'News successfully updated.');
        return redirect()->route('news.index');
    }


//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'title' => 'required',
//            'category_name' => 'required',
//            'details' => 'required',
//            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Updated validation rule
//        ]);
//
//        $news = News::findOrFail($id);
//
//        if ($news){
//
//        }
//
//        $news->title = $request->title;
//        $news->category = $request->category_name;
//        $news->details = $request->details;
//
//
//
//        if ($request->hasFile('thumbnail')) {
//            // Delete the old thumbnail if it exists
//            if ($news->thumbnail && file_exists(storage_path('uploads/' . $news->thumbnail))) {
//                unlink(storage_path('uploads/' . $news->thumbnail));
//            }
//
//            // Upload the new thumbnail
//            $image = $request->file('thumbnail');
//            $imageName = time() . '.' . $image->extension();
//            $image->move(storage_path('uploads'), $imageName);
//            $news->thumbnail = $imageName;
//        }
//
//        $news->save();
//
//        Session::flash('success', 'News successfully updated.');
//        return redirect()->route('news.index');
//    }
//






    public function destroy($id)
    {
        $news = News::find($id);

        if ($news) {
            $news->delete();
            return redirect()->route('news.index')->with('success', 'News deleted successfully.');
        }

        return redirect()->route('news.index')->with('error', 'News not found.');
    }


}

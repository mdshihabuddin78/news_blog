<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\Console\Style\section;

class CategoryController extends Controller
{
    public function category()
    {
       $data['category'] = category::get();
        return view('backend.category.categorylist',$data);
    }


//    public function news()
//    {
//       $data['category'] = category::get();
//        return view('backend.category.CategoryNews',$data);
//    }

//    public function news()
//    {
//        return view('backend.category.CategoryNaws');
//    }



    public function create()
    {
        return view('backend.category.categoryCreate');
    }






    public function store(Request $request)
    {

        $this->validate($request, [
            'category_name' => 'required|max:255',
            'details' => 'sometimes',
        ]);

        $category = new category();
        $category->category_name = $request->input('category_name');
        $category->details = $request->input('details');
        $category->save();
        \Illuminate\Support\Facades\Session::flash('Success', 'Successfully Inserted');
        return redirect()->back();
    }


    public function edit($id)
    {
        $data['category'] = category::where('id',$id)->first();
        return view('backend.category.categoryedit',$data);

    }


    public function update(Request $request)

    {
        $id = request()->input('id');

        $this->validate($request, [
            'id' => 'required',
            'category_name' => 'required|max:255',
            'details' => 'sometimes',
        ]);

        $category= category::where('id', $id)->first();
        if ($category){
            $category->category_name = $request->input('category_name');
            $category->details = $request->input('details');
            $category->update();

            Session::flash('Success', 'Successfully update');
            return redirect()->back();


        }



        Session::flash('Success', 'data not fount');
        return redirect()->back();
    }



    public function delete($id)
    {
        $category = category::find($id);
        if ($category) {
            $category->delete();
            Session::flash('Success', 'Successfully deleted');
            return redirect()->back();
        }

        Session::flash('Error', 'Data not found');
        return redirect()->back();
    }



//    public function CateList(){
//
//            return view('backend.Categorice.Cate_list');
//    }
//    public function getCategories() {
//        $categories = category::all();
//        return response()->json(['categories' => $categories]);
//    }

//    public function deleteCategory($id) {
//        $category = category::find($id);
//        if ($category) {
//            $category->delete();
//            return response()->json(['success' => 'Category deleted successfully']);
//        } else {
//            return response()->json(['error' => 'Category not found'], 404);
//        }
//    }

//    public function CateCreate()
//    {
//        return view('backend.Categorice.Cate_Create');
//    }



}

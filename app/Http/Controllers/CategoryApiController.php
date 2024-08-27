<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index(){
        $date = category::get();
        return response()->json(['result'=>$date, 'status'=>2000]);
    }

    public function store(Request $request)
    {

       try {
           $this->validate($request, [
               'category_name' => 'required|max:255',
               'details' => 'sometimes',
           ]);

           $category = new category();
           $category->category_name = $request->input('category_name');
           $category->details = $request->input('details');
           $category->save();

       }catch (Exception $exception) {
           return response()->json(['result' => null, 'message' => $exception->getMessage(), 'status' => 5000]);
       }
    }

    public function update(Request $request)

    {
       try{
           $id = request()->input('id');

           $this->validate($request, [
               'id' => 'required',
               'category_name' => 'required|max:255',
               'details' => 'sometimes',
           ]);

           $category = category::where('id', $id)->first();
           if ($category) {
               $category->category_name = $request->input('category_name');
               $category->details = $request->input('details');
               $category->update();
               return response()->json(['result'=>null,'message'=>'Successfully Updated', 'status'=>2000]);
             }
           return response()->json(['result'=>null,'message'=>'Not Updated', 'status'=>5000]);

        }catch (Exception $exception) {
           return response()->json(['result' => null, 'message' => $exception->getMessage(), 'status' => 5000]);
       }
    }
    public function destroy($id){
        try{
            $category = category::find($id);
            if ($category) {
                $category->delete();
                return response()->json(['result'=>null,'message'=>'Successfully', 'status'=>2000]);
            }
            return response()->json(['result'=>null,'message'=>'Not Deleted', 'status'=>5000]);

        }catch (Exception $exception){
            return response()->json(['result'=>null,'message'=>$exception->getMessage(), 'status'=>5000]);
        }

    }

}

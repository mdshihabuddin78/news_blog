<?php

namespace App\Http\Controllers\frontend;

use App\Helpers\Support;
use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;
use Illuminate\Http\Request;
use function Nette\Utils\data;

class CommentController extends Controller
{
    use Support;
    public function index(){
        $data['url'] = \request()->input('url');
        return view('auth.visitor_login',$data);
    }


    public function create()
    {
        $data['url'] = \request()->input('url');
        return view('auth.visitor_registration',$data);
    }

    public function store(Request $request)
    {

        $comment = new comment();
        $comment->visitor_id = auth()->guard('visitor')->user()->id;
        $comment->post = $request->input('post');
        $comment->comment = $request->input('message');
        $comment->save();


        return response()->json(['message' => 'Successfully created comment!', 'status' => 2000] , 200);
    }



    public function commentList()
    {
        return view('backend.commentList');
    }
    public function getComments()
    {
        $data=comment::with('visitor:id,name')->get();
        return response()->json(['result'=>$data,'status'=>2000]);
//
//        try {
//            $data = comment::with('Visitor:id,name')->get();
//
////            return retData($data);
//            return $this->retData($data);
//        }catch (\Exception $exception){
//            return retData($exception->getMessage(), 'Something Wrong', 5000);
//        }
    }


        public function commentDelete(){
        $id=\request()->input('id');
        $comment=comment::where('id',$id)->first();
        if ($comment){
            $comment->delete();
            return retData(null, 'Successfully deleted comment!');
        }
    }

//        try {
//            $id = \request()->input('id');
//            $comment = comment::where('id', $id)->first();
//            if ($comment){
//                $comment->delete();
//                return retData(null, 'Successfully deleted comment!');
//            }
//        }catch (\Exception $exception){
//            return retData($exception->getMessage(), 'Something Wrong', 5000);
//        }




}
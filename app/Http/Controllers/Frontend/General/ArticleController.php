<?php

namespace App\Http\Controllers\Frontend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General\{
    Blogs,
    BlogsComments,
    BlogsStatus,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index($id)
    {
        $getBlogs = Blogs::where("id", $id)->first();
        $getComments = BlogsComments::where("id_blog", $id)->paginate(10);

        return view('frontend.pages.article', [
            "blog" => $getBlogs,
            "comments" => $getComments,
        ]);
    }

    public function makeComments(Request $request)
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            "email" => "required",
            "fullname" => "required",
            "comments" => "required|min:6",
        ])->validate();

        $dataReq = [
            "user_id" => $user->id,
            "email" => $request->email,
            "fullname" => $request->fullname,
            "comments" => $request->comments,
            "id_blog" => $request->id_blog,
        ];
        BlogsComments::create($dataReq);

        return redirect()->back()->with("message", "terkirim!");
    }

    public function update($idComment, Request $request)
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            "comments" => "required|min:6",
        ])->validate();

        $dataReq = [
            "comments" => $request->comments,
        ];
        BlogsComments::where("id", $request->id_comment)->update($dataReq);

        return redirect()->back()->with("message", "terkirim!");
    }

    public function destroy($idComment)
    {
        $user = Auth::user();

        $delete = BlogsComments::where("id", $idComment)->where("user_id", $user->id)->delete();

        if ($delete) {
            return redirect()->back()->with("message", "terhapus!");
        }
    }
}

<?php

namespace App\Http\Controllers\Backend\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General\{
    Blogs,
    BlogsComments,
    BlogsStatus,
};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth", ["except" => []]);
    }

    public function index()
    {
        $getBlogs = Blogs::all();
        return view("backend.pages.blog.index", ["blogs" => $getBlogs]);
    }

    public function add()
    {
        $status_blog = BlogsStatus::all();
        return view("backend.pages.blog.add", ["status_blog" => $status_blog]);
    }

    public function edit($id)
    {
        $checkBlog = Blogs::where("id", $id)->first();
        $status_blog = BlogsStatus::all();
        return view("backend.pages.blog.edit", [
            "status_blog" => $status_blog,
            "blog" => $checkBlog,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        Validator::make($request->all(), [
            "title" => "required",
            "status_blog" => "required",
            "blogs_desc" => "required",
            "blogs_contents" => "required",
            "blogs_image" => "required",
        ])->validate();

        $checkBlog = Blogs::where("blogs_title", $request->title)->first();

        if (isset($checkBlog->id)) {
            return redirect()->back()->with('message', 'Artikel sudah pernah ada!');
        } else {
            if ($request->status_blog == "Published") {
                $timePublished = date("Y-m-d H:i:s");
            } else {
                $timePublished = null;
            }
            $dataReq = [
                "blogs_title" => $request->title,
                "status" => $request->status_blog,
                "blogs_desc" => $request->blogs_desc,
                "blogs_contents" => $request->blogs_contents,
                "blogs_image" => $request->blogs_image,
                "authors" => $user->fullname,
                "published_at" => $timePublished,
            ];
            $saved = Blogs::create($dataReq);

            if (isset($saved->id)) {
                $getBlogs = Blogs::all();
                // return view("backend.pages.blog.index", ["blogs" => $getBlogs]);
                return redirect()->route("blog_index")->with(["blogs" => $getBlogs]);
            } else {
                return redirect()->back()->withErrors(['message', 'Gagal menyimpan Artikel!']);
            }
        }
        
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        Validator::make($request->all(), [
            "title" => "required",
            "status_blog" => "required",
            "blogs_desc" => "required",
            "blogs_contents" => "required",
            "blogs_image" => "required",
        ])->validate();

        if ($request->status_blog == "Published") {
            $timePublished = date("Y-m-d H:i:s");
        } else {
            $timePublished = null;
        }
        $dataReq = [
            "blogs_title" => $request->title,
            "status" => $request->status_blog,
            "blogs_desc" => $request->blogs_desc,
            "blogs_contents" => $request->blogs_contents,
            "blogs_image" => $request->blogs_image,
            "authors" => $user->fullname,
            "published_at" => $timePublished,
        ];
        $saved = Blogs::where("id", $request->id_blog)->update($dataReq);

        if ($saved) {
            $getBlogs = Blogs::all();
            return redirect()->route("blog_index")->with(["blogs" => $getBlogs]);
        } else {
            return redirect()->back()->withErrors(['message', 'Gagal menyimpan Artikel!']);
        }
        
    }
}

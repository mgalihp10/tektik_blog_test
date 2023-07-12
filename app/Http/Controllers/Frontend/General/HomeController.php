<?php

namespace App\Http\Controllers\Frontend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General\{
    Blogs,
    BlogsComments,
    BlogsStatus,
};

class HomeController extends Controller
{
    public function index()
    {
        $getBlogs = Blogs::paginate(4);
        return view('frontend.pages.home', [
            "blogs" => $getBlogs,
        ]);
    }
}

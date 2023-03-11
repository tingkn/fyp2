<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(5);
        return view('blog', compact('blogs'));
    }


    public function show($title)
    {
        $blog = Blog::where('title', $title)->first();
        return view('blog.index', compact('blog'));
    }

}

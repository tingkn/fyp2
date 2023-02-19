<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $data['blogs'] = Blog::orderBy('id','desc')->paginate(5);
        return view('blog', $data);
    }
}

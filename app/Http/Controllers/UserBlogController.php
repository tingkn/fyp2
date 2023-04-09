<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::inRandomOrder()->paginate(12);
        return view('blog', compact('blogs'));
    }
    
    public function show($title)
    {
        $blog = Blog::where('title', $title)->first();
    
        if (!$blog) {
            abort(404); // or return an error message
        }

        // Get other blog posts except for the current one
        $related_blogs = Blog::where('id', '<>', $blog->id)
                             ->orderBy('created_at', 'desc')
                             ->take(3)
                             ->get();
    
        return view('blog.index', compact('blog', 'related_blogs'));
    }
}

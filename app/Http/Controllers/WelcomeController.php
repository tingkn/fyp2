<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
        $blogs = Blog::inRandomOrder()->paginate(3);
        return view('welcome', compact('blogs'));
    }

}

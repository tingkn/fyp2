<?php
namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['blogs'] = Blog::orderBy('id','desc')->paginate(5);
        return view('blogs.index', $data);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('blogs.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'content' => 'required',
        ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return redirect()->route('blogs.index')
        ->with('success','Blog has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\blog  $blog
    * @return \Illuminate\Http\Response
    */
    public function show(Blog $blog)
    {
        return view('blogs.show',compact('blog'));
    } 

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Blog  $blog
    * @return \Illuminate\Http\Response
    */
    public function edit(Blog $blog)
    {
        return view('blogs.edit',compact('blog'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\blog  $blog
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required',
        'content' => 'required',
        ]);
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return redirect()->route('blogs.index')
        ->with('success','Blog has been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Blog  $blog
    * @return \Illuminate\Http\Response
    */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')
        ->with('success','Blog has been deleted successfully');
    }
}
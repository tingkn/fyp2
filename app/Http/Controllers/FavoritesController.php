<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;


class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id())
            ->orderBy('id')
            ->paginate(7);
    
        $posts = DB::table('posts')
            ->join('favorites', 'posts.id', '=', 'favorites.post_id')
            ->select('posts.title')
            ->where('favorites.user_id', auth()->id())
            ->get();
    
        return view('favorites.index', compact('favorites', 'posts'));
    }
    
    public function store(Request $request)
    {
        // Check if the post is already favorited by the user
        $existingFavorite = Favorite::where('user_id', auth()->user()->id)
                                     ->where('post_id', $request->post_id)
                                     ->first();
    
        if ($existingFavorite) {
            return redirect()->back()->with('error', 'This post is already in your favorites.');
        }
    
        // Create a new favorite for the post
        $favorite = new Favorite;
        $favorite->user_id = auth()->user()->id;
        $favorite->post_id = $request->post_id;
        $favorite->save();
    
        return redirect()->back()->with('success', 'Added to favorites successfully.');
    }
    
    public function destroy($id)
    {
        $favorites = Favorite::where('id', $id)->firstorfail()->delete();
        return redirect()->route('favorites.index')
        ->with('success','Post has been removed from favorite successfully');
    }

}

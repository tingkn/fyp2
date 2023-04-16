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
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $favorites = Favorite::query()
            ->when($search, function ($q) use ($search) {
                return $q->where(function ($query) use ($search) {
                    $query->whereHas('post', function ($q) use ($search) {
                        $q->where('title', 'like', '%'.$search.'%');
                    });
                });
            })
            ->with('post:title') // eager load post title
            ->where('user_id', auth()->id()) // filter by user ID
            ->orderBy('id')
            ->paginate(7);
    
        return view('favorites.index', compact('favorites'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingCentre;


class WTRecycleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $recyclingcentre = RecyclingCentre::query()
            ->when($search, function ($q) use ($search) {
                return $q->where(function ($query) use ($search) {
                    $query->where('postcode', 'like', '%'.$search.'%')
                          ->orWhere('name', 'like', '%'.$search.'%');
                })
                ->orWhere('address', 'like', '%'.$search.'%');
            })
            ->paginate(16);
                    
        return view('WTRecycle.index', compact('recyclingcentre'));
    }
    
    public function show($id)
    {
        $recyclingcentre = RecyclingCentre::findOrFail($id);
        return view('recyclingcentre', compact('recyclingcentre', 'id', 'postcode', 'address', 'name'));
    }
}

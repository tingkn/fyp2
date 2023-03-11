<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecyclingCentre;


class WTRecycleController extends Controller
{
    public function show($id)
    {
        $recyclingcentre = RecyclingCentre::findOrFail($id);
        return view('recyclingcentre', compact('recyclingcentre', 'id', 'postcode', 'address', 'name'));
    }
}

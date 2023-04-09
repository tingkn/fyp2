<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plastics;


class HTRecycleController extends Controller
{        
    public function show($id)
    {
        $plastics = Plastics::findOrFail($id);
        return view('plastics', compact('plastics', 'id', 'content', 'name'));
    }
}

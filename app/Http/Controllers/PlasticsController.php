<?php

namespace App\Http\Controllers;

use App\Models\Plastics;
use DB;
use Illuminate\Http\Request;

class PlasticsController extends Controller
{
    public function index()
    {
        $plastics = [];
        $searchTerm = request()->query('search');

        if ($searchTerm) {
            $plastics = DB::table('plastics')
                ->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('content', 'like', '%' . $searchTerm . '%')
                ->paginate(10);
        } else {
            $plastics = DB::table('plastics')
                ->paginate(10);
        }

        return view('HTRecycle', compact('plastics'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->input('email');
        
        $existingEmail = DB::table('newsletter')->where('email', $email)->exists();

        if ($existingEmail) {
            return response()->json(['message' => 'Email already subscribed'], 422);
        }
                
        DB::table('newsletter')->insert([
            'email' => $email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return response()->json(['message' => 'Email saved successfully!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::latest('id')
                    ->with('sender')
                    ->paginate(20);
        return view('messages.index', compact('messages'));
    }
            
    public function create()
    {
        $users = User::where('id', '<>', auth()->id())->get();
        return view('messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);
    
        $message = new Message();
        $message->sender_id = auth()->id();
        $message->content = $request->input('content');
        $message->save();
    
        return redirect()->route('messages.index');
    }
}

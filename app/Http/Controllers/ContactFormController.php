<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactFormController extends Controller
{
    public function index()
    {
        $data['contact'] = Contact::orderBy('id','desc')->paginate(5);
        return view('contactus.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'content' => 'required'
        ]);
        $contact_form = new Contact;
        $contact_form->name = $request->name;
        $contact_form->email = $request->email;
        $contact_form->content = $request->content;
        $contact_form->save();
        return redirect()->route('contactus.index')
        ->with('success','Message has been sent successfully.');
    }
}

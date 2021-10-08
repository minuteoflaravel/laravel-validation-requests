<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:contacts',
        ]);

        Contact::create($request->only(['name','email']));

        Session::flash('message', 'Contact was created successfully!');

        return back();
    }
}

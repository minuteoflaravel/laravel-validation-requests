<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        Contact::create($request->only(['name','email']));

        Session::flash('message', 'Contact was created successfully!');

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactsController extends Controller
{
    public function index() {
        // $contacts = Contact::all();
        // $contacts = Contact::select('name', 'email')->get();
        $contacts = Contact::all(['name', 'email']);
        return response()->json($contacts);
    }
}

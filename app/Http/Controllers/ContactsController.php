<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactsController extends Controller
{
    public function index() {
        // $contacts = Contact::all();
        // $contacts = Contact::select('name', 'email')->get();
        $contacts = Contact::all(['id', 'name', 'email']);
        return response()->json($contacts);
    }

    public function show($id) {
        // $contact = Contact::where('id', $id)->first();
        $contact = Contact::select('id', 'name', 'email')->find($id);

        if(!$contact) {
            return response()->json([
                'message' => 'Contact does not exists'
            ], 404);
        }

        return response()->json($contact);
    }
}

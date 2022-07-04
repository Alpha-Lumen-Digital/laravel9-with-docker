<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
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

    public function store(StoreContactRequest $request) {
        $contactAlreadyExists = Contact::where('email', $request->email)->first();

        if($contactAlreadyExists) {
            return response()->json([
                'message' => 'Contact already exists!'
            ], 404);
        }

        // $contact = new Contact();
        // $contact->name = $request->name;
        // $contact->email = $request->email;
        // $contact->save();

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json($contact);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:contacts,phone',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contact::create($request->all());
        return redirect()->back()->with('success', 'Contact added successfully.');
    }



    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }



    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:contacts,phone,' . $contact->id,
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }


    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}


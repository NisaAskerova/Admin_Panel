<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string'
        ]);

        ContactUs::create($validated);

        return response()->json(['message' => 'Message received successfully!'], 200);
    }

    public function show(){
        $contacts = ContactUs::all();
        return response()->json($contacts);
    }

    public function delete($id){
        $contact = ContactUs::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json(['message' => 'contact deleted successfully!']);
        } else {
            return response()->json(['message' => 'contact not found!'], 404);
        }
    }

}

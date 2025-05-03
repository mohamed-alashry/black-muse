<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        // Validate inputs
        $data = $request->validated();

        Contact::create([
            'client_id' => $data['client_id'],
            'email'     => $data['email'],
            'name'      => $data['name'],
            'subject'   => $data['subject'],
            'message'   => $data['message'] ?? null,
        ]);

        return response()->json(['message' => 'success']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactQuery;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        ContactQuery::create($validated);

        $whatsappNumber = '8074111406';
        $text = "Hello Aadya Construction, I am " . $validated['name'] . ". \nEmail: " . $validated['email'] . " \nMessage: " . $validated['message'];
        $url = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($text);

        return redirect()->away($url);
    }
}

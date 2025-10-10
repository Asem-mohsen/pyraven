<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;

class ContactController extends Controller
{

    public function store(StoreContactUsRequest $request)
    {
        $validated = $request->validated();

        ContactUs::create($validated);

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}

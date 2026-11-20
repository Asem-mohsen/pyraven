<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Mail\ContactInquiry;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(StoreContactUsRequest $request)
    {
        // Save first so an inquiry is never lost if the mail server is down.
        $inquiry = ContactUs::create($request->contactData());

        try {
            Mail::to(config('app.email'))->send(new ContactInquiry($inquiry, app()->getLocale()));
        } catch (Throwable $e) {
            Log::error('Contact inquiry email failed', ['contact_id' => $inquiry->id, 'error' => $e->getMessage()]);
        }

        return redirect()->to(lroute('contact'))
            ->with('success', __('site.contact.success', ['name' => $inquiry->name, 'email' => $inquiry->email]));
    }
}

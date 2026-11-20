<?php

namespace App\Mail;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Notification to the Pyraven inbox for a website inquiry.
 * Sent FROM our own domain with Reply-To set to the visitor, never From: visitor.
 */
class ContactInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactUs $inquiry, public string $siteLocale = 'en') {}

    public function envelope(): Envelope
    {
        // Subject is user-controlled: collapse whitespace so it can't inject headers.
        $subject = trim(preg_replace('/\s+/', ' ', $this->inquiry->subject ?: 'New project inquiry'));

        return new Envelope(
            replyTo: [new Address($this->inquiry->email, $this->inquiry->name)],
            subject: '[Website] '.mb_substr($subject, 0, 120),
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.contact-inquiry',
            with: ['config' => ['app_name' => config('app.name')], 'language' => $this->siteLocale === 'ar' ? 'Arabic' : 'English'],
        );
    }
}

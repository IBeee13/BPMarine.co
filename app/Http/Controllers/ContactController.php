<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        Mail::raw(
            "New inquiry received from the BP Marine Co website.\n" .
                "─────────────────────────────\n" .
                "Name    : {$validated['name']}\n" .
                "Email   : {$validated['email']}\n" .
                "Phone   : " . ($validated['phone']   ?? '-') . "\n" .
                "Company : " . ($validated['company'] ?? '-') . "\n" .
                "Country : " . ($validated['country'] ?? '-') . "\n" .
                "Subject : {$validated['subject']}\n" .
                "─────────────────────────────\n\n" .
                "Message:\n{$validated['message']}\n\n" .
                "─────────────────────────────\n" .
                "Reply directly to this email to respond to the sender.",
            function ($mail) use ($validated) {
                $mail->to('binapusaka98@gmail.com')
                    ->subject('New Inquiry: ' . $validated['subject'])
                    ->replyTo($validated['email'], $validated['name']);
            }
        );

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
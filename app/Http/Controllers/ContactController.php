<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\ContactFormSubmitted;



class ContactController extends Controller
{public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }
    
    public function store(Request $request)
{
    // Valideer de aanvraag
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Sla de gegevens op in de database
    Contact::create($validated);

    // Verstuur de e-mail naar de admin
    $adminEmail = env('MAIL_ADMIN_EMAIL');
    Mail::to('admin@ehb.be')->send(new ContactFormSubmitted($validated)); // Pas hier $validated aan

    // Geef een succesbericht terug naar de view
    return back()->with('success', 'Your message has been sent successfully!');
}
public function reply(Request $request, Contact $contact)
    {
        // Valideer het antwoord
        $validated = $request->validate([
            'reply' => 'required|string',
        ]);

        // Bewaar het antwoord in de 'reply' kolom
        $contact->reply = $validated['reply'];
        $contact->save();

        // Verzend een e-mail naar de klant (optioneel, afhankelijk van je behoeften)
        // Mail::to($contact->email)->send(new ContactReplyMail($contact));

        return redirect()->route('admin.contacts.index')->with('success', 'Antwoord succesvol verzonden!');
    }

    
}
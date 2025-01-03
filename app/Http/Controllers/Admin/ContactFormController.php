<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;


class ContactFormController extends Controller
{
    public function index()
    {
        // Haal alle ingevulde contactformulieren op
        // $contactForms = ContactForm::all();
        $contacts = ContactForm::paginate(10);


        // Toon de view met de contactformulieren
        return view('admin.contacts.index', compact('contactForms'));
    }

    // Toon de details van een specifiek formulier
    public function show($id)
    {
        // Haal het contactformulier op
        $contactForm = ContactForm::findOrFail($id);

        // Toon de view met de formulier details
        return view('admin.contacts.show', compact('contactForm'));
    }

    // Beantwoord het contactformulier
    public function reply(Request $request, $id)
    {
        $contact = ContactForm::findOrFail($id);

        // Sla het antwoord op in de database
        $contact->update([
            'reply' => $request->input('reply'),
        ]);

        // Optioneel: stuur een e-mail naar de gebruiker (als je deze functionaliteit wilt)
        // Mail::to($contact->email)->send(new ContactFormReply($contact));

        // Redirect naar de lijst van contactformulieren met een succesbericht
        return redirect()->route('admin.contactforms.index')->with('success', 'Antwoord succesvol verzonden!');
    
    }
}



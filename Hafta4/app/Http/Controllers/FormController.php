<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

class FormController extends Controller
{
    public function index(){
        $konular = [
            'Öğrenci İşleri',
            'Sosyal Olanaklar',
            'Yönetmelikler',
            'Barınma Olanakları',
            'Laboratuvarlar',
            'Yemekhane',
            'Diğer',
        ];
        return view('form', compact('konular'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ]);

        // $contact = new Contacts();
        // $contact->name = $request->input('name');
        // $contact->email = $request->input('email');
        // $contact->subject = $request->input('subject');
        // $contact->message = $request->input('message');
        // $contact->save();

        Contact::create($validatedData);

        dd($validatedData, 'Onaylanmıştır');
        
        return redirect()->back()->with('success', 'Form başarıyla gönderildi!');
    }
}

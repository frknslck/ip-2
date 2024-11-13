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
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'dob' => 'required|date',
            'gender' => 'required',
            'education' => 'required',
            'skills' => 'required|array',
            'skin_color' => 'required',
            'message' => 'required|min:10',
        ]);
        
        $validatedData['skills'] = implode(', ', $request->input('skills'));

        Contact::create($validatedData);
        
        return redirect()->back()->with('success', 'Başvurunuz başarıyla alındı!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Contact::paginate(perPage: 5);
        
        return view('messages', compact('messages'));
    }

    public function delete(int $id) {
        $message = Contact::findOrFail($id);
        $message->delete();
        return redirect('/messages');
    }   

    public function read(int $id) {
        $selectedMessage = Contact::findOrFail($id);
        $messages = Contact::all();
        return view('messages', compact('messages', 'selectedMessage'));
    } 

    public function update(Request $request, int $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'education' => 'required|string',
            'message' => 'required|string',
        ]);

        $message = Contact::findOrFail($id);
        $message->update($request->all());

        return redirect('/messages')->with('success', 'Mesaj başarıyla güncellendi.');
    }
}

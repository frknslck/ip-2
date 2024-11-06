<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){

        $messages = Contact::all();

        return view('messages', compact('messages'));
    }

    public function delete(int $id){
        $message = Contact::find($id);  
        $message->delete();
        return redirect('/messages');
    }   

    
    public function read(int $id) {
        $selectedMessage = Contact::find($id);
        $messages = Contact::all();
        return view('messages', compact('messages', 'selectedMessage'));
    } 
}

<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{

    public function index()
    {
        return view('comment.list');
    }

    public function add(Request $request)
    {
        // try {
        $this->validate($request, [
            'first_name' => 'required|string|min:2|max:60',
            'last_name' => 'required|string|min:2|max:60',
            'email' => 'required|email:rfc,dns',
            'content' => 'required|string|min:50',
        ]);
        //avoid error with csrf token and unknown data  

        $message = Message::create($request->only([
            'first_name',
            'last_name',
            'email',
            'content',
        ]));

        //envoie de mail tester via mailtrap lets go
        //pour de meilleur performance on queue le message
        Mail::to('it@sfg.fr')->queue(new MessageReceived($message));

        return redirect()->back()->with('success', 'Ajout effectuer avec succes');
        // } catch (ValidationException $e) {
        //     //jsp quoi en faire pour linstant  
        // }
    }
}

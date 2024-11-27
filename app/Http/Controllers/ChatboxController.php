<?php

namespace App\Http\Controllers;

use App\Models\Chatbox;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ChatboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(Chatbox $ticket_id)
    {
        $messages=Chatbox::all();
        return view('ticket.chatboxTicket', compact('messages', 'ticket_id'));
    }

    public function store(Request $request)
    {
        $message=new Chatbox;
        $message->user_id = $request->user_id;
        $message->ticket_id = $request->ticket_id;
        $message->message = $request->message;
        $message->save();

        $messages=Chatbox::all();
        $ticket_id = Ticket::find($request->ticket_id);
        return view('ticket.chatboxTicket', compact('messages', 'ticket_id'));

    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Chatbox;
use Illuminate\Http\Request;

use App\Models\User;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $users = User::all();
        $messages = Chatbox::all();
        return view('ticket.indexTicket', compact('tickets', 'users', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::all();
        return view('ticket.createTicket', compact('categories', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $ticket=New Ticket;
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->category_id = $request->category_id;
        $ticket->priority_id = $request->priority_id;
        $ticket->submitted_by = $request->submitted_by;
        $ticket->save();

        $tickets = Ticket::all();

        return view('ticket.indexTicket', compact('tickets'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.detailTicket', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $priorities = Priority::all();
        return view('ticket.editTicket', compact('categories', 'priorities','ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $tickets = Ticket::all();

        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->category_id = $request->category_id;
        $ticket->priority_id = $request->priority_id;
        $ticket->save();

        return redirect()->route('ticket.index')->with('tickets');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index');
    }

    public function assign(Request $request, Ticket $ticket)
    {
        $ticket->assigned_to = $request->user;
        $ticket->save();

        return redirect()->route('ticket.index')->with('tickets');
    }
}

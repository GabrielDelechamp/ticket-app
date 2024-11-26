<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ticket.indexTicket');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.createTicket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket=New Ticket;
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->category = $request->category;
        $ticket->priority = $request->priority;
        $ticket->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.detailTicket');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.editTicket');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->category = $request->category;
        $ticket->priority = $request->priority;
        $ticket->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticekt.index');
    }
}

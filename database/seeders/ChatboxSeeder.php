<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Chatbox;

class ChatboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets= Ticket::all();
        foreach ($tickets as $ticket)
        {
            $message = New Chatbox;
            $message->ticket_id = $ticket->id;
            $message->user_id = 0;
            $message->message = "Ticket #".$ticket->id." is assigned to you.";

            $message->save();
        }
    }
}

<x-app-layout>
    <div class="text-white flex flex-col gap-5">
        @foreach ($messages as $message)
            @if ($message->ticket_id == $ticket_id->id && $message->user_id !=0)
            <div class="flex  w-[600px]
                @if (Auth::user()->id == $message->user_id)
                justify-end
                @endif
                ">
                <div class="flex flex-col">
                    <p>{{$message->user->name}}</p>
                    <p class="bg-gray-400 w-[300px] p-2 rounded-md">{{$message->message}}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <form method="post" action="{{ route('chatbox.store') }}">
        @method('patch')
        @csrf
        <input type="text" name="message" placeholder="type here">
        <input type="hidden" name="ticket_id" value='{{$ticket_id->id}}'>
        <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
        <input type="submit" value="Envoyer" class="bg-white p-2 rounded-xl">
    </form>
</x-app-layout>

<x-app-layout>
<ul class="text-white">
    <li>{{$ticket->title}}</li>
    <li>{{$ticket->description}}</li>
    <li>{{$ticket->categories->name}}</li>
    <li>{{$ticket->priorities->name}}</li>
</ul>
<x-button link="{{route('ticket.index')}}" class="bg-cyan-500">Retour</x-button>
</x-app-layout>

<x-app-layout>
<x-button link="{{route('ticket.create')}}" class="bg-cyan-500">Ajouter</x-button>
    <table class="text-white">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Priorité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->categories->name}}</td>
                <td class="w-[80px]"><span class="block w-2 h-2 rounded-full float-left mt-2 mr-2
                @if ($ticket->priorities->name == 'low')
                    bg-green-500
                    @elseif ($ticket->priorities->name == 'medium')
                    bg-yellow-500
                    @elseif ($ticket->priorities->name == 'high')
                    bg-red-500
                @endif"></span>{{$ticket->priorities->name}}</td>
                <td class='flex gap-2'>
                    <x-button link="{{ route('ticket.show', ['ticket' => $ticket]) }}" class="bg-green-500">Détail</x-button>
                    <x-button link="{{ route('ticket.edit', ['ticket' => $ticket]) }}" class="bg-yellow-500">Éditer</x-button>
                    <form method="post" action="{{ route('ticket.destroy', ['ticket' => $ticket]) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="p-2 text-white bg-red-500 rounded-xl">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>

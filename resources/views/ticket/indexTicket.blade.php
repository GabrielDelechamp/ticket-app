<x-app-layout>
    @if (Auth::user()->can('ticket-create'))
    <x-button link="{{route('ticket.create')}}" class="bg-cyan-500">Ajouter</x-button>
    @endif
    <table class="text-white">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>État</th>
                <th>Priorité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            @if(Auth::user()->isA('client') && Auth::user()->id==$ticket->submitted_by || Auth::user()->isAn('admin') || Auth::user()->isA('dev') && Auth::user()->id==$ticket->assigned_to)
            <tr>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->categories->name}}</td>
                <td>{{$ticket->state}}</td>
                <td class="w-[80px]"><span class="block w-2 h-2 rounded-full float-left mt-2 mr-2
                @if ($ticket->priorities->name == 'low')
                    bg-green-500
                    @elseif ($ticket->priorities->name == 'medium')
                    bg-yellow-500
                    @elseif ($ticket->priorities->name == 'high')
                    bg-red-500
                @endif"></span>{{$ticket->priorities->name}}</td>
                <td class='flex gap-2'>
                    @if (Auth::user()->can('ticket-retrieve'))
                    <x-button link="{{ route('ticket.show', ['ticket' => $ticket]) }}" class="bg-green-500">Détail</x-button>
                    @endif
                    @if (Auth::user()->can('ticket-update'))
                    <x-button link="{{ route('ticket.edit', ['ticket' => $ticket]) }}" class="bg-yellow-500">Éditer</x-button>
                    @endif
                    @if (Auth::user()->can('ticket-delete'))
                    <form method="post" action="{{ route('ticket.destroy', ['ticket' => $ticket]) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="p-2 text-white bg-red-500 rounded-xl">Supprimer</button>
                    </form>
                    @endif
                    <form method="post" action="{{route('ticket.changeState', ['ticket' => $ticket])}}">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="state" value='finished'>
                        <button type="submit" class="p-2 text-white bg-blue-500 rounded-xl">Terminer</button>
                    </form>
                    <form method="post" action="{{route('ticket.changeState', ['ticket' => $ticket])}}">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="state" value='canceled'>
                        <button type="submit" class="p-2 text-white bg-orange-500 rounded-xl">Annuler</button>
                    </form>
                    <x-button link="{{route('chatbox.show', ['ticket_id' => $ticket->id])}}">CHAT</x-button>
                    @if(Auth::user()->isAn('admin') && $ticket->assigned_to == null)
                    <form method="post" action="{{ route('ticket.assign', ['ticket' => $ticket]) }}">
                        @method('get')
                        @csrf
                        <select name="user" class="text-black">
                            @foreach ($users as $user)
                                @if ($user->isA('dev'))
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit" class="p-2 text-white bg-purple-500 rounded-xl">Assigner</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</x-app-layout>

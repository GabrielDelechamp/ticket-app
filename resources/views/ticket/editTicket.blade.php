<x-app-layout>
    <form action="{{route('ticket.update', ['ticket' => $ticket])}}" method='post'>
        @csrf
        @method('put')
        <label for="title">Titre</label>
        <input type="text" name="title" value="{{ old('title', $ticket->title) }}">
        <label for="description">Description</label>
        <input type="text" name="description" value="{{ old('description', $ticket->description) }}">
        <label for="category_id">Catégorie</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == $ticket->category_id)selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="priority_id">Priorité</label>
        <select name="priority_id">
            @foreach($priorities as $priority)
                <option value="{{ $priority->id }}"  @if ($priority->id == $ticket->priority_id)selected @endif>{{ $priority->name }}</option>
            @endforeach
        </select>
        <input type="hidden" name="submitted_by" value="{{Auth::user()->id}}">
        <button type="submit">Envoyer</button>
    </form>
</x-app-layout>

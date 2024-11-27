<x-app-layout>
    <form action="{{route('ticket.store')}}" method='post'>
        @csrf
        @method('post')
        <label for="title" class="text-white">Titre</label>
        <input type="text" name="title">
        <label for="description" class="text-white">Description</label>
        <input type="text" name="description">
        <label for="category_id" class="text-white">Catégorie</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="priority_id" class="text-white">Priorité</label>
        <select name="priority_id">
            @foreach($priorities as $priority)
                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
            @endforeach
        </select>
        <input type="hidden" name="submitted_by" value="{{Auth::user()->id}}">
        <button type="submit" class="text-white">Envoyer</button>
    </form>
</x-app-layout>

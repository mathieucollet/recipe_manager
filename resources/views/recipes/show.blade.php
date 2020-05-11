{{$recipe->name}}
@foreach ($recipe->ingredients as $ingredient)
    <ul>
        <li>{{ $ingredient->name }}</li>
    </ul>
@endforeach
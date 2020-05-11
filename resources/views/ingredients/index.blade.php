@foreach ($ingredients as $ingredient)
    {{ $ingredient->name }} -> {{ $ingredient->price }}€<br>
@endforeach
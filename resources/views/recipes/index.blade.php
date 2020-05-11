@foreach ($recipes as $recipe)
    {{ $recipe->name }} -> {{ $recipe->instructions }}€<br>
@endforeach
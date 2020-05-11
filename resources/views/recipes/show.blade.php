{{$recipe->name}}
@foreach ($recipe->ingredients as $ingredient)
    <ul>
        <li>{{ $ingredient->name }}</li>
    </ul>
@endforeach
@foreach ($recipe->pictures as $picture)
    <img src="{{ asset($picture->img_path) }}" alt="" style="width:400px; height:200px"><br>
    <form action="{{ route('picture.destroy', $picture->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button>Delete Picture</button>
    </form>
@endforeach
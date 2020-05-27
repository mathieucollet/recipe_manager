@extends('layouts.app')
@section('content')

    <div class="col-12">

        <a href="{{ route('ingredient.create') }}" class="btn btn-primary">Ajouter un nouvel ingrédient</a>

        <ul class="list-group mt-4">
            @foreach ($ingredients as $ingredient)
                <li class="list-group-item">

                    <div class="row">
                        <div class="col" style="text-align: right;">
                            <b> <a href="/ingredient/{{ $ingredient->id }}"
                                   style="text-decoration: none; color: black;">{{ $ingredient->name }}</a> : </b>

                        </div>
                        <div class="col">
                            {{ $ingredient->price }}€
                        </div>
                        <div class="col-auto" style="max-width: fit-content;">
                            <form action="/ingredient/{{ $ingredient->id }}/edit">
                                <button type="submit" title="Modifier l'ingrédient" class="btn btn-sm btn-primary">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </button>
                            </form>
                        </div>
                        <form action="/ingredient/{{$ingredient->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" title="Supprimer l'ingrédient"
                                    onclick="return confirm('Êtes-vous sur de vouloir supprimer cet ingrédient ?')"
                                    class="btn btn-sm btn-danger">
                                <span class="material-icons">
                                    delete_forever
                                </span>
                            </button>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>

    </div>

@endsection
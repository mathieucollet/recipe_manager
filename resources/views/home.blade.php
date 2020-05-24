@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-9 ml-sm-auto col-lg-10">
            <form class="form-inline my-2 mb-4" action="/home" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher une recette" aria-label="Search" name="search">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Rechercher</button>
                <a href="/home" class="btn btn-outline-danger ml-4">raz</a>
            </form>

            <div class="row">
                @foreach ($recipes as $recipe)
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <img src="{{ asset($recipe->pictures[0]->img_path) }}" class="card-img-top" alt="recipe picture"
                                 style="height:220px;object-fit:cover;">
                            <div class="card-body">
                                <a href="/recipe/{{$recipe->id}}" style="text-decoration: none;"><h5
                                            class="card-title">{{ $recipe->name }}</h5></a>
                                <p class="card-text">{{ $recipe->description }}</p>
                            </div>
                            <div class="flex row ml-3 mb-2">
                                @foreach($recipe->tags as $tag)
                                    <span class="badge badge-info text-white mr-1">{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

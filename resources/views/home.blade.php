@extends('layouts.app')

@section('content')
    <div class="col-12">
        <form class="form-inline my-2 mb-4" action="/home" method="post">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher une recette" aria-label="Search" name="search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Rechercher</button>
            <a href="/home" class="btn btn-outline-danger ml-4">raz</a>
        </form>

        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-lg-4 mb-3">
                    <div class="card position-relative">
                        <a href="/recipe/{{$recipe->id}}" style="text-decoration: none;">
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($recipe->pictures->first()->img_path) }}"
                                 class="card-img-top" alt="recipe picture"
                                 style="height:220px;object-fit:cover;">
                        </a>
                        @if (auth()->user())
                            <div class="like-btn-svg {{$recipe->marked ? 'liked' : ''}} home" title="Ajouter aux favoris"
                                 data-id="{{$recipe->id}}">
                            </div>
                        @endif
                        <div class="card-body">
                            <a href="/recipe/{{$recipe->id}}" style="text-decoration: none;">
                                <h5 class="card-title">
                                    {{ $recipe->name }}
                                </h5>
                            </a>
                            <p class="card-text">{{ $recipe->description }}</p>
                        </div>
                        <div class="col-10 mb-4 d-flex flex-wrap">
                            @foreach($recipe->tags as $tag)
                                <span class="badge badge-info text-white mr-1 mb-1">{{$tag->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

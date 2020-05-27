@extends('layouts.app')

@section('content')
    <div class="col-12">

        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-lg-4 mb-3">
                    <div class="card position-relative">
                        <a href="/recipe/{{$recipe->id}}" style="text-decoration: none;">
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($recipe->pictures->first()->img_path) }}"
                                 class="card-img-top" alt="recipe picture"
                                 style="height:220px;object-fit:cover;">
                        </a>
                        <div class="like-btn-svg {{$recipe->marked ? 'liked' : ''}} home" title="Ajouter aux favoris"
                             data-id="{{$recipe->id}}">
                        </div>
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

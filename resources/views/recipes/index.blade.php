@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-lg-4 mb-3">
                    <div class="card position-relative">
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($recipe->pictures->first()->img_path) }}"
                             class="card-img-top"
                             alt="recipe picture"
                             style="height:220px;object-fit:cover;">
                        <div class="like-btn-svg {{$recipe->marked ? 'liked' : ''}} home" title="Ajouter aux favoris"
                             data-id="{{$recipe->id}}">
                        </div>
                        <div class="card-body">
                            <form action="/recipe/{{ $recipe->id }}/edit">
                                <div type="submit" title="Modifier la recette" class="float-right h3" style="-webkit-appearance: initial;"
                                     onClick="javascript:this.parentNode.submit();">🔧
                                </div>
                            </form>
                            <h5 class="card-title">
                                <a href="/recipe/{{ $recipe->id }}" style="text-decoration: none;">
                                    {{ $recipe->name }}
                                </a>
                            </h5>
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
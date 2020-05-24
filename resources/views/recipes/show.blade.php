@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-10">
            <div class="col-md-9 ml-sm-auto col-lg-10">
                <div class="card text-center">
                    <div class="card-header">
                        @foreach ($recipe->pictures as $picture)
                            <img src="{{ asset($picture->img_path) }}" alt="" style="width:400px; height:200px"><br>
                            @if ($recipe->user_id === auth()->user()->id)
                                <form action="{{ route('picture.destroy', $picture->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger mt-2">Delete Picture</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe->name}}</h5>
                        <p class="card-text"><span class="font-weight-bold">Description : </span>{{$recipe->description}}</p>
                        <p class="card-text"><span class="font-weight-bold">Ingrédients : </span></p>
                        @foreach ($recipe->ingredients as $ingredient)
                            <ul>
                                <li>{{ $ingredient->name }}</li>
                            </ul>
                        @endforeach
                        <p class="card-text"><span
                                    class="font-weight-bold">Instructions {{$recipe->marked ? 'ok': 'notok'}} : </span>{!! $recipe->instructions !!}
                        </p>
                        <p class="card-text"><span class="font-weight-bold">Temps de préparation : </span>{{$recipe->minutes}}</p>
                        <p class="card-text"><span class="font-weight-bold">Difficulté : </span>{{$recipe->difficulty}}</p>
                        @if ($recipe->user_id === auth()->user()->id)
                            <a href="#" class="btn btn-primary">
                                <form action="/recipe/{{ $recipe->id }}/edit">
                                    <div type="submit" style="-webkit-appearance: initial;" onClick="javascript:this.parentNode.submit();">
                                        Modifier ma recette
                                    </div>
                                </form>
                            </a>
                        @endif
                        <div class="like-btn-svg"><input class="form-check-input" type="checkbox" id="marked" name="marked" for="marked"
                                                         value="{{$recipe->marked ? '1' : '0'}}" style="display: none;"></div>
                    </div>
                    <div class="card-footer text-muted">
                        @foreach($recipe->tags as $tag)
                            <span class="badge badge-info text-white mr-1">{{$tag->name}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>

    <style type="text/css">
        .like-btn-svg {
            width: 80px;
            height: 100px;
            position: absolute;
            right: 0;
            bottom: -15px; /* temp value */
            transform: translate(-50%, -50%);
            background: url(https://abs.twimg.com/a/1446542199/img/t1/web_heart_animation.png) no-repeat;
            background-position: 0 0;
            cursor: pointer;
        }

        .like-btn-svg.animate {
            transition: background 1s steps(28);
            animation: fave-like-btn-svg 1s steps(28);
            background-position: -2800px 0;
        }

        @keyframes fave-like-btn-svg {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: -2800px 0;
            }
        }
    </style>

    <script>
        $('.like-btn-svg').on('click', function () {
            $(this).toggleClass('animate');
        });
    </script>

@endsection
@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto">
            <div class="col-md-9 ml-sm-auto col-lg-10">
                <div class="card text-center">
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($recipe->pictures->first()->img_path) }}" alt=""
                         class="card-img-top" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <div class="row" style="margin:-20px -20px 0 -20px;">
                            @foreach ($recipe->pictures->splice(1) as $picture)
                                <div class="col-12 col-md-3 p-0 mx-auto position-relative" style="height:100px">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($picture->img_path) }}" alt=""
                                         class="w-100 h-100" style="object-fit:cover;">
                                    @if (auth()->user() && $recipe->user_id === auth()->user()->id)
                                        <form action="{{ route('picture.destroy', $picture->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit"
                                                   onclick="return confirm('Êtes-vous sur de vouloir supprimer cette image ?')"
                                                   class="btn btn-danger rounded-circle mt-2 position-absolute"
                                                   style="bottom:5px; right:5px;" value="✗"/>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <h3 class="card-title mt-4 font-weight-bold">{{$recipe->name}}</h3>
                        <p class="card-text"><span class="font-weight-bold">Description : </span>{{$recipe->description}}</p>
                        <p class="card-text"><span class="font-weight-bold">Temps de préparation : </span>{{$recipe->minutes}} minutes</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Difficulté : </span>
                            @for ($i = 0; $i < $recipe->difficulty; $i++)
                                <span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>
                            @endfor
                            @for ($i = 5; $i > $recipe->difficulty; $i--)
                                <span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>
                            @endfor
                        </p>
                        <div class="row mt-4">
                            <div class="col-12 col-md-3">
                                <h5 class="card-text font-weight-bold">Ingrédients :</h5>
                                <ul class="list-group">
                                    @foreach ($recipe->ingredients as $ingredient)
                                        <li class="list-group-item">{{ $ingredient->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="card-text font-weight-bold">
                                    Instructions :
                                </h5>
                                <div class="instructions">
                                    {!! $recipe->instructions !!}
                                </div>
                            </div>
                        </div>
                        @if (auth()->user() && $recipe->user_id === auth()->user()->id)
                            <a href="#" class="btn btn-primary">
                                <form action="/recipe/{{ $recipe->id }}/edit">
                                    <div type="submit" style="-webkit-appearance: initial;" onClick="javascript:this.parentNode.submit();">
                                        Modifier ma recette
                                    </div>
                                </form>
                            </a>
                        @endif
                        @if (auth()->user() && $recipe->user_id !== auth()->user()->id)
                            <div class="like-btn-svg {{$recipe->marked ? 'liked' : ''}}" data-id="{{$recipe->id}}">
                            </div>
                        @endif
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

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>--}}



@endsection
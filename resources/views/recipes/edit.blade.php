@extends('layouts.app')

@section('content')
    <div class="row">
        <p>{{$message ?? ''}}</p>
        <div class="col-md-9 ml-sm-auto col-lg-10">
            <div class="col-10">
                <div class="col-md-9 ml-sm-auto col-lg-10">
                    <form action="{{$recipe->path()}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom : </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$recipe->name}}">
                            @error('name')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description : </label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$recipe->description}}">
                            @error('description')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ingredients">Ingrédients :</label>
                            <select class="selectpicker form-control" multiple data-live-search="true" data-dropup-auto="false"
                                    id="ingredients" name="ingredients[]">
                                @foreach ($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id}}"
                                            @if (in_array($ingredient->id, old('ingredients', $recipe->ingredients->pluck('id')->toArray())))
                                            selected
                                            @endif
                                    >{{ $ingredient->name }}</option>
                                @endforeach
                            </select>
                            @error('ingredients')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inscrutions">Instructions : </label>
                            <textarea class="form-control" id="inscrutions" name="instructions" aria-describedby="instructionHelp"
                                      placeholder=""
                                      rows="3">{{$recipe->instructions}}</textarea>
                            @error('instructions')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <small id="instructionHelp" class="form-text text-muted">Essayez d'être le plus précis possible.</small>
                        </div>

                        <div class="form-group">
                            <label for="minutes">Temps : </label>
                            <input type="number" class="form-control" id="minutes" name="minutes" value="{{$recipe->minutes}}">
                            @error('minutes')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags :</label>
                            <select class="selectpicker form-control" multiple data-live-search="true" data-dropup-auto="false" id="tags"
                                    name="tags[]">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id}}"
                                            @if (in_array($tag->id, old('tags', $recipe->tags->pluck('id')->toArray())))
                                            selected
                                            @endif
                                    >{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="difficulty">Difficulté : </label><br>
                            <input type="range" min="1" max="5" value="{{$recipe->difficulty}}" class="slider" id="difficulty"
                                   name="difficulty">
                            <p><span id="in_slider_value"></span></p>
                            @error('difficulty')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pictures">Photos : <span class="text-muted">Pas plus de 5 images</label><br>
                            <input type="file" id="pictures" name="pictures[]" accept="image/*" multiple value="{{$recipe->img_path}}">
                            @error('pictures')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="shared" name="shared" for="shared"
                                   value="{{$recipe->shared}}">
                            <label class="form-check-label">Partager ma recette</span></label>
                        </div>

                        <a href="{{route('recipe.index')}}" class="btn btn-outline-primary">Retour</a>
                        <button type="submit" class="btn btn-primary">Modifier ma recette</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

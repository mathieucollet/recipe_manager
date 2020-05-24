@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="/recipe" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-10">
                    <div class="col-md-9 ml-sm-auto col-lg-10">

                        <div class="form-group">
                            <label for="name">Nom : </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                            @error('name')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description : </label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="">
                            @error('description')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ingredients">Ingrédients :</label>
                            <select class="selectpicker form-control" multiple data-live-search="true" data-dropup-auto="false"
                                    id="ingredients" name="ingredients[]">
                                @foreach ($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id}}">{{ $ingredient->name }}</option>
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
                                      rows="3"></textarea>
                            @error('instructions')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <small id="instructionHelp" class="form-text text-muted">Essayez d'être le plus précis possible.</small>
                        </div>

                        <div class="form-group">
                            <label for="minutes">Temps : </label>
                            <input type="number" class="form-control" id="minutes" name="minutes">
                            @error('minutes')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags :</label>
                            <select class="selectpicker form-control" multiple data-live-search="true" data-dropup-auto="false" id="tags"
                                    name="tags[]">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id}}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="difficulty">Difficulté : </label><br>
                            <input type="range" min="1" max="5" value="1" class="slider" id="difficulty" name="difficulty">
                            <p><span id="in_slider_value"></span></p>
                        </div>

                        <div class="form-group">
                            <label for="pictures">Photos : </label><br>
                            <input type="file" id="pictures" name="pictures[]" accept="image/*" multiple>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input"  type="checkbox" id="shared" name="shared" for="shared" value="1">
                            <label class="form-check-label">Partager ma recette</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer ma nouvelle recette !</button>

                    </div>
                </div>

            </div>
        </form>
    </div>


    <script>
        var slider = document.getElementById("difficulty");
        var output = document.getElementById("in_slider_value");
        output.innerHTML = "⭐";

        slider.oninput = function () {
            switch (this.value) {
                case '1':
                    output.innerHTML = "⭐";
                    break;
                case '2':
                    output.innerHTML = "⭐⭐";
                    break;
                case '3':
                    output.innerHTML = "⭐⭐⭐";
                    break;
                case '4':
                    output.innerHTML = "⭐⭐⭐⭐";
                    break;
                case '5':
                    output.innerHTML = "⭐⭐⭐⭐⭐";
                    break;
                default:
                    output.innerHTML = "❗";
                    break;
            }
        };
    </script>
@endsection
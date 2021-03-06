@extends('layouts.app')

@section('content')
    <div class="col-12 col-lg-8 mx-lg-auto">

        <form action="{{$recipe->path()}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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
                <textarea class="form-control" id="instructions" name="instructions" aria-describedby="instructionHelp"
                          placeholder=""
                          rows="3">{{$recipe->instructions}}</textarea>
                @error('instructions')
                <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
                <small id="instructionHelp" class="form-text text-muted">Essayez d'être le plus précis possible.</small>
            </div>

            <div class="form-group">
                <label for="minutes">Temps : <span class="text-muted">en minutes</span></label>
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
                <input type="range" min="1" max="5" value="{{$recipe->difficulty}}" class="slider w-100" id="difficulty" name="difficulty">
                <div id="in_slider_value" class="d-flex justify-content-between">
                    <span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>
                    <span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>
                    <span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>
                    <span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>
                    <span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>
                </div>
            </div>

            <div class="form-group">
                <label for="pictures">Photos : <span class="text-muted">Pas plus de 5 images</span></label><br>
                <input type="file" id="pictures" name="pictures[]" accept="image/*" multiple>
                @error('pictures')
                <small id="instructionHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input type="hidden" name="shared" value="0">
                <input class="form-check-input" type="checkbox" id="shared" name="shared" for="shared"
                       {{$recipe->shared ? 'checked' : ''}} value="1">
                <label class="form-check-label">Partager ma recette</label>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{route('recipe.index')}}" class="btn btn-outline-primary">Retour</a>
                <button type="submit" class="btn btn-primary">Modifier ma recette</button>
            </div>
        </form>
    </div>

@endsection
@section('additional-scripts')
    <script>
        const slider = $("#difficulty");
        const output = $("#in_slider_value");

        slider.on('input', function () {
            switch ($(this).val()) {
                case '1':
                    output.html('<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>');
                    break;
                case '2':
                    output.html('<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>');
                    break;
                case '3':
                    output.html('<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>');
                    break;
                case '4':
                    output.html('<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: lightgray">&#x2605;</span>');
                    break;
                case '5':
                    output.html('<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>\n' +
                        '<span style="font-size: 1.5rem; color: #FDD630">&#x2605;</span>');
                    break;
                default:
                    break;
            }
        });
        slider.trigger('input');

        $(document).ready(function () {
            $('#instructions').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
            });
        });
    </script>
@endsection

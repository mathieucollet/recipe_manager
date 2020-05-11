@extends('layouts.app')

@section('content')
    <!-- FIXME: leftnav links break, but topnav link still works -->
    <div class="container-fluid">
        <!-- TODO: add name attributs to send data  -->
        <form>
            <div class="row">

                <div class="col-10">
                    <div class="col-md-9 ml-sm-auto col-lg-10">

                        <div class="form-group">
                            <label for="in_name">Nom : </label>
                            <input type="text" class="form-control" id="in_name" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="in_description">Description : </label>
                            <input type="text" class="form-control" id="in_description" placeholder="">
                        </div>
                        <div class="form-group">
                            <select class="selectpicker form-control">
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="in_instructions">Instructions : </label>
                            <textarea class="form-control" id="in_instructions" aria-describedby="instructionHelp" placeholder=""
                                      rows="3"></textarea>
                            <small id="instructionHelp" class="form-text text-muted">Essayez d'être le plus précis possible.</small>
                        </div>

                        <div class="form-group">
                            <label for="in_temps">Temps : </label>
                            <input type="time" class="form-control" id="in_temps">
                        </div>

                        <div class="form-group">
                            <label for="in_slider">Difficulté : </label><br>
                            <input type="range" min="1" max="5" value="1" class="slider" id="in_slider">
                            <p><span id="in_slider_value"></span></p>
                        </div>

                        <div class="form-group">
                            <label for="in_picts">Photos : </label><br>
                            <input type="file" id="in_picts" accept="image/*" multiple>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer ma nouvelle recette !</button>

                    </div>
                </div>

                <div class="col-2">
                    <h3>Sélectionnez les ingrédients nécessaires</h3>
                    <div>
                        <input id="in_ingredients_ing1" name="in_ingredients" type="checkbox" value="ing1">
                        <label for="in_ingredients_ing1">ing1</label>
                    </div>
                    <div>
                        <input id="in_ingredients_ing2" name="in_ingredients" type="checkbox" value="ing2">
                        <label for="in_ingredients_ing2">ing2</label>
                    </div>
                </div class="col-2">

            </div>
        </form>
    </div>


    <script>
        var slider = document.getElementById("in_slider");
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
@extends('layouts.app')

@section('content')
    <div class="col-12 col-lg-8 mx-lg-auto">

        <form action="{{$ingredient->path()}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="in_nom">Nouveau nom : </label>
                <input type="text" class="form-control" id="in_nom" name="name" value="{{$ingredient->name}}">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="in_prix">Nouveau prix : </label>
                <input type="text" class="form-control" id="in_prix" name="price"
                       value="{{$ingredient->price}}">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{route('ingredient.index')}}" class="btn btn-outline-info font-weight-bold">Retour</a>
                <button type="submit" class="btn btn-primary" style="min-width: 15rem;">Modifier l'ingrédient !</button>
            </div>
        </form>
    </div>
@endsection
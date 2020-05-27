@extends('layouts.app')

@section('content')
    <div class="col-12 col-lg-8 mx-lg-auto">
        <form action="/ingredient" method="post">
            @csrf
            <div class="form-group">
                <label for="in_nom">Nom : </label>
                <input type="text" class="form-control" id="in_nom" name="name" placeholder="Tomate">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="in_prix">Prix : </label>
                <input type="text" class="form-control" id="in_prix" name="price" placeholder="1.50">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{route('ingredient.index')}}" class="btn btn-outline-info font-weight-bold">Retour</a>
                <button type="submit" class="btn btn-primary">Ajouter le nouvel ingrédient !</button>
            </div>
        </form>
    </div>
@endsection
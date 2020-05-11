@extends('layouts.app')

@section('content')

<form action="/ingredient" method="post">
    @csrf
    
    <div class="col-md-9 ml-sm-auto col-lg-10">
        
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
        
        <button type="submit" class="btn btn-primary">Ajouter mon nouvel ingrédent !</button>
        
    </div>
</form>


@endsection
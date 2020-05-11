@extends('layouts.app')

@section('content')

<form action="{{$ingredient->path()}}" method="post">
@csrf
@method('patch')

<div class="row">
    
    <div class="col-10">
        <div class="col-md-9 ml-sm-auto col-lg-10">
            <div class="form-group">
            <label for="in_nom">Nouveau nom : </label>
            <input type="text" class="form-control" id="in_nom" name="name" placeholder="Ancien nom : {{$ingredient->name}}">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="in_prix">Nouveau prix : </label>
            <input type="text" class="form-control" id="in_prix" name="price" placeholder="Ancien prix : {{$ingredient->price}}">
            @error('price')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier l'ingrédient !</button>

        </div>
    </div>
</div>

</form>

@endsection
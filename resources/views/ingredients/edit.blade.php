@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-10">
            <div class="col-md-9 ml-sm-auto col-lg-10">
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
                    <button type="submit" class="btn btn-primary" style="min-width: 15rem;">Modifier l'ingrédient !</button>
                </form>
                <form action="/ingredient/{{$ingredient->id}}" method="POST">
                    <!-- <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-danger">Supprimer l'ingrédient !</button> -->

                    <br>
                    <form action="/ingredient/{{$ingredient->id}}" method="post">
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" style="min-width: 15rem;">Supprimer l'ingrédient !</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
@endsection
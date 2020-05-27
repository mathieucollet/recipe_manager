@extends('layouts.app')

@section('content')
    <div class="col-12 col-lg-8 mx-lg-auto">

        <form action="{{$tag->path()}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Nouveau nom : </label>
                <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{route('tag.index')}}" class="btn btn-outline-primary">Retour</a>
                <button type="submit" class="btn btn-primary" style="min-width: 15rem;">Modifier le tag !</button>
            </div>
        </form>
    </div>
@endsection
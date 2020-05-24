@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-10">
            <div class="col-md-9 ml-sm-auto col-lg-10">
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
                    <button type="submit" class="btn btn-primary" style="min-width: 15rem;">Modifier le tag !</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 ml-sm-auto col-lg-10">

                    <form action="/admin/tag" method="post" class="form-inline">
                        @csrf
                        <label class="sr-only" for="name">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="name" name="name" placeholder="Soupe, dessert ...">
                        <button type="submit" class="btn btn-primary mb-2">
                            Ajouter un tag
                        </button>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-12 d-flex flex-wrap">
                            <ul class="list-group col-12 col-md-6 col-lg-4">
                                @for ($i = 0; $i < $first; $i++)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            {{$tags[$i]->name}}
                                            <div class="d-flex">
                                                <a href="{{$tags[$i]->path().'/edit'}}" class="btn btn-outline-info btn-sm"
                                                   title="Modifier le tag">
                                                    <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{$tags[$i]->path()}}" method="post" class="ml-4">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le tag"
                                                            onclick="return confirm('Êtes vous certain de vouloir supprimer ce tag ?')">
                                                        <span class="material-icons">delete_outline</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                            <ul class="list-group col-12 col-md-4">
                                @for ($i = $first; $i < $second; $i++)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            {{$tags[$i]->name}}
                                            <div class="d-flex">
                                                <a href="{{$tags[$i]->path().'/edit'}}" class="btn btn-outline-info btn-sm"
                                                   title="Modifier le tag">
                                                    <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{$tags[$i]->path()}}" method="post" class="ml-4">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le tag"
                                                            onclick="return confirm('Êtes vous certain de vouloir supprimer ce tag ?')">
                                                        <span class="material-icons">delete_outline</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                            <ul class="list-group col-12 col-md-4">
                                @for ($i = $second; $i < $last; $i++)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            {{$tags[$i]->name}}
                                            <div class="d-flex">
                                                <a href="{{$tags[$i]->path().'/edit'}}" class="btn btn-outline-info btn-sm"
                                                   title="Modifier le tag">
                                                    <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{$tags[$i]->path()}}" method="post" class="ml-4">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le tag"
                                                            onclick="return confirm('Êtes vous certain de vouloir supprimer ce tag ?')">
                                                        <span class="material-icons">delete_outline</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
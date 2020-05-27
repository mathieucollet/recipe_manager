@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-8 mx-lg-auto">
            <table class="table table-bordered bg-white" style="max-width: fit-content;">
                <tbody>
                <tr>
                    <th scope="row">Nom</th>
                    <td>{{$ingredient->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Prix</th>
                    <td>{{$ingredient->price}}</td>
                </tr>
                <tr>
                    <th scope="row">Créé le</th>
                    <td>{{$ingredient->created_at}}</td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <form action="/ingredient/{{$ingredient->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"
                            onclick="return confirm('Êtes-vous sur de vouloir supprimer cet ingrédient ?')"
                            class="btn btn-danger">
                        Supprimer
                    </button>
                </form>
                <a href="{{$ingredient->path().'/edit'}}" class="btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')

<div class="row">
    
    <div class="col-10">
        <div class="col-md-9 ml-sm-auto col-lg-10">

            <table class="table table-bordered" style="max-width: fit-content;">
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


        </div>
    </div>
</div>

@endsection
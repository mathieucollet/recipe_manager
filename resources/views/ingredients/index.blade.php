@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 ml-sm-auto col-lg-10">
                
                <form action="/ingredient/create">
                    <button type="submit" class="btn btn-primary">Ajouter mon nouvel ingrédient</button>
                </form>
                <br>
                
                <!-- Version left-align simple -->
                <!-- <ul class="list-group">
                    @foreach ($ingredients as $ingredient)
                    <li class="list-group-item"> <b> {{ $ingredient->name }} </b> : {{ $ingredient->price }}€</li>
                    @endforeach
                </ul> -->
                
                <ul class="list-group">
                    @foreach ($ingredients as $ingredient)
                    <li class="list-group-item">
                        
                        <div class="row">
                            <div class="col" style="text-align: right;">
                                <b> <a href="/ingredient/{{ $ingredient->id }}" style="text-decoration: none; color: black;">{{ $ingredient->name }}</a> :  </b> 
                                 
                            </div>
                            <div class="col">
                                {{ $ingredient->price }}€
                            </div>
                            <div class="col" style="max-width: fit-content;">
                                <form action="/ingredient/{{ $ingredient->id }}/edit">
                                    <button type="submit" class="btn btn-primary">Modifier l'ingrédient</button>
                                </form>
                            </div>
                        </div>
                        
                    </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>
</div>

@endsection
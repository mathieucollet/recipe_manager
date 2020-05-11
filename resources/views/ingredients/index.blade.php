@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 ml-sm-auto col-lg-10">
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
                                    <b> {{ $ingredient->name }} </b> : 
                                </div>
                                <div class="col">
                                    {{ $ingredient->price }}€
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
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-md-9 ml-sm-auto col-lg-10">
        <form class="form-inline my-2 mb-4">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher une recette" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Rechercher</button>
        </form>

        <div class="row">
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">  
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                    </div>
                    <div class="flex row ml-3 mb-2">
                        <span class="badge badge-info flex col-2 text-white mr-1">Entrée</span>
                        <span class="badge badge-info flex col-2 text-white mr-1">Plat</span>
                        <span class="badge badge-info flex col-2 text-white mr-1">Dessert</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">  
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                    </div>
                    <div class="flex row ml-3 mb-2">
                        <span class="badge badge-info flex col-2 text-white mr-1">Entrée</span>
                        <span class="badge badge-info flex col-2 text-white mr-1">Plat</span>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">  
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                    </div>
                    <div class="flex row ml-3 mb-2">
                        <span class="badge badge-info flex col-2 text-white mr-1">Entrée</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">  
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">  
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
    <a class="navbar-brand text-white font-weight-bold" href="{{ route('home') }}">My Super Recipe Manager</a>
    <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="w-100 h-100 d-flex justify-content-between">
            <ul class="navbar-nav mr-auto d-lg-none">
                @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('recipe.create') }}">
                            Créer ma recette
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('ingredient.index') }}">
                            Liste des ingrédients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('recipe.marks') }}">
                            Recettes favorites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('recipe.index') }}">
                            Mes recettes
                        </a>
                    </li>
                @endif
                @if (auth()->user() && auth()->user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('tag.index') }}">
                            Gestion des tags
                        </a>
                    </li>
                @endif
            </ul>
            <div class="d-flex flex-column flex-lg-row justify-content-around align-items-center justify-content-lg-center align-items-lg-center ml-auto">
                <div class="text-white mr-lg-4">{{ auth()->user()->name ?? '' }}</div>
                @if (\Illuminate\Support\Facades\Auth::check())
                    <form action="/logout" method="post">
                        @csrf
                        <input type="submit" value="Logout">
                    </form>
                @else
                    <form action="/login" method="get" class="mr-2">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </form>
                    <form action="/register" method="get">
                        <button type="submit" class="btn btn-primary">Inscription</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>
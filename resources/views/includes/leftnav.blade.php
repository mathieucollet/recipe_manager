<nav class="navbar navbar-expand-md fixed-left mt-5">
    <div class="sidebar-sticky mt-2">
        <ul class="nav flex-column">
            @if (auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recipe.create') }}">
                        Créer ma recette
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ingredient.index') }}">
                        Liste des ingrédients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recipe.marks') }}">
                        Recettes favorites
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recipe.index') }}">
                        Mes recettes
                    </a>
                </li>
            @endif
            @if (auth()->user() && auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tag.index') }}">
                        Gestion des tags
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>

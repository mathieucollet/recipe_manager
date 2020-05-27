<nav class="navbar navbar-light bg-dark fixed-top">
    <a href="{{ route('home') }}" class="navbar-brand text-white font-weight-bold">My Super Recipe Manager</a>
    <div class="d-flex justify-content-center align-items-center">
        <div class="text-white mr-4">{{ auth()->user()->name ?? '' }}</div>
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
</nav>
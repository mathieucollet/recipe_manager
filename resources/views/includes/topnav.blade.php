<nav class="navbar navbar-light bg-dark fixed-top">
    <a href="{{ route('home') }}" class="navbar-brand text-white font-weight-bold">My Super Recipe Manager</a>
    <div class="d-flex">
        <div class="text-white">{{ auth()->user()->name ?? '' }}</div>
        @if (\Illuminate\Support\Facades\Auth::check())
            <form action="/logout" method="post">
                @csrf
                <input type="submit" value="Logout">
            </form>
        @else
            <span>login</span>
            <span>signin</span>
        @endif
    </div>
</nav>
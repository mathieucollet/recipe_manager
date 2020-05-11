<nav class="navbar navbar-light bg-dark fixed-top">
    <a href="{{ route('home') }}" class="navbar-brand text-white font-weight-bold">My Super Recipe Manager</a>
    <div class="text-white">{{ auth()->user()->name ?? '' }}</div>
</nav>
<!-- NAVBAR -->
<nav class="navbar navbar-expand navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            Schokoladenseite
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- NAVBAR LINKS -->
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
            </li>
        </ul>
    </div>
</nav>

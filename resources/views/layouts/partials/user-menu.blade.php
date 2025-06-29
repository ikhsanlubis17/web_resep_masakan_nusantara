<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('my-recipes') ? 'active' : '' }}" href="{{ route('my-recipes') }}">
        <i class="bi bi-journal-text"></i>
        <span>Resep Saya</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('favorites.*') ? 'active' : '' }}" href="{{ route('favorites.index') }}">
        <i class="bi bi-heart-fill"></i>
        <span>Favorit</span>
        <span class="badge bg-danger ms-1 animate-bounce-gentle">{{ auth()->user()->favorites()->count() }}</span>
    </a>
</li>

@if(auth()->user()->isAdmin())
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>
@endif

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
        <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="user-avatar me-2">
        <span class="fw-semibold d-none d-md-inline">{{ Auth::user()->name }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <div class="px-3 py-3 border-bottom">
            <div class="fw-bold text-gradient">{{ Auth::user()->name }}</div>
            <small class="text-muted">{{ Auth::user()->email }}</small>
        </div>
        <a class="dropdown-item" href="{{ route('profile.show') }}">
            <i class="bi bi-person-circle"></i>
            <span>Profil Saya</span>
        </a>
        <a class="dropdown-item" href="{{ route('recipes.create') }}">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Tambah Resep</span>
        </a>
        <a class="dropdown-item" href="{{ route('my-recipes') }}">
            <i class="bi bi-journal-text"></i>
            <span>Resep Saya</span>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span>Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>

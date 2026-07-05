<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand"
            href="{{ auth()->check()
                ? (auth()->user()->role == 'SuperAdmin'
                    ? route('superadmin.dashboard')
                    : (auth()->user()->role == 'Admin'
                        ? route('admin.dashboard')
                        : route('member.dashboard')))
                : url('/') }}">
            URL Shortener
        </a>

        <div class="d-flex gap-2">

            @if (auth()->user()->role == 'SuperAdmin')
                <a href="{{ route('superadmin.companies.index') }}" class="btn btn-outline-light btn-sm">
                    Companies
                </a>

                <a href="{{ route('superadmin.admin.index') }}" class="btn btn-outline-light btn-sm">
                    Admin
                </a>
            @elseif(auth()->user()->role == 'Admin')
                <a href="{{ route('admin.members.index') }}" class="btn btn-outline-light btn-sm">
                    Members
                </a>

                <a href="{{ route('admin.short-urls.index') }}" class="btn btn-outline-light btn-sm">
                    Short URLs
                </a>
            @elseif(auth()->user()->role == 'Member')
                <a href="{{ route('short-urls.index') }}" class="btn btn-outline-light btn-sm">
                    Short URLs
                </a>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>

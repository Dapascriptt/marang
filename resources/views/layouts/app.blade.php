<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventory') - Manajemen Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f6f7fb;
        }

        .app-sidebar {
            min-height: calc(100vh - 56px);
            background: #ffffff;
            border-right: 1px solid #e9ecef;
        }

        .sidebar-link {
            color: #374151;
            border-radius: 8px;
            display: block;
            padding: .65rem .85rem;
            text-decoration: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: #0d6efd;
            color: #ffffff;
        }

        .content-wrap {
            min-height: calc(100vh - 56px);
        }

        .page-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .04);
        }

        @media (max-width: 991.98px) {
            .app-sidebar {
                min-height: auto;
                border-right: 0;
                border-bottom: 1px solid #e9ecef;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <div class="ms-auto d-flex flex-column flex-lg-row gap-2 align-items-lg-center mt-3 mt-lg-0">
                    <span class="text-white small">{{ auth()->user()->name ?? 'Guest' }}</span>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @auth
                <aside class="col-lg-2 app-sidebar p-3">
                    <nav class="d-grid gap-2">
                        <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('categories.index') }}" class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">Kategori</a>
                        <a href="{{ route('items.index') }}" class="sidebar-link {{ request()->routeIs('items.*') ? 'active' : '' }}">Barang</a>
                    </nav>
                </aside>
            @endauth

            <main class="@auth col-lg-10 @else col-12 @endauth content-wrap p-3 p-lg-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@push('styles')
    <style>
        .admin-navbar {
            background: #fff;
            border-bottom: 1px solid #dce1e7;
        }

        .admin-body {
            background: #f8f9fa;
        }

        .admin-navbar .navbar-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: #263b53;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .admin-brand-mark {
            display: grid;
            width: 1.8rem;
            height: 2.6rem;
            place-items: center;
            border: 2px solid #263b53;
            background: #dff3fa;
            color: #263b53;
            font-size: 1rem;
        }

        .admin-navbar .navbar-nav {
            min-height: 4.25rem;
        }

        .admin-navbar ~ main {
            min-height: calc(100vh - 4.75rem);
            background: #f8f9fa;
        }

        .admin-form-page {
            display: flex;
            justify-content: center;
            padding: 2.75rem 1rem;
        }

        .admin-form-card {
            width: min(100%, 60rem);
            align-self: flex-start;
        }

        .admin-form-card .card-header {
            padding: 1.25rem 1.875rem;
        }

        .admin-form-card .card-body {
            padding: 1.5rem 1.875rem;
        }

        .admin-form-card .form-label {
            font-size: 1.1rem;
        }

        .admin-form-card .form-control:not([type="color"]) {
            min-height: 3.25rem;
        }

        .admin-navbar .nav-link {
            display: flex;
            align-items: center;
            padding-inline: 1rem;
            border-bottom: 3px solid transparent;
            color: #41546d;
        }

        .admin-navbar .nav-link.active {
            border-bottom-color: var(--tblr-primary);
            color: #263b53;
        }

        @media (max-width: 767.98px) {
            .admin-navbar .navbar-nav {
                min-height: auto;
            }

            .admin-navbar .nav-link.active {
                border-bottom-color: transparent;
                border-left: 3px solid var(--tblr-primary);
            }
        }
    </style>
@endpush

<header class="navbar navbar-expand-md d-print-none admin-navbar">
    <div class="container-xl">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand me-4" aria-label="EBooks, dashboard">
            <span class="admin-brand-mark" aria-hidden="true"><i class="fa-solid fa-book-open"></i></span>
            <span>EBooks</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#admin-navbar-menu" aria-controls="admin-navbar-menu" aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="admin-navbar-menu">
            <nav class="navbar-nav mx-auto flex-column flex-md-row" aria-label="Navigasi admin">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">Dashboard</a>
                <a href="{{ route('admin.book-categories.index') }}" class="nav-link">Kategori Buku</a>
                <a href="{{ route('admin.subscription-packages.index') }}" class="nav-link">Paket Langganan</a>
                <a href="{{ route('home') }}#books" class="nav-link">Buku</a>
            </nav>

            <div class="navbar-nav order-md-last ms-md-auto py-2 py-md-0">
                <a href="{{ route('logout') }}" class="btn btn-danger">Keluar</a>
            </div>
        </div>
    </div>
</header>

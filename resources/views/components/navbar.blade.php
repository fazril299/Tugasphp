<header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl"><button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <!-- BEGIN NAVBAR LOGO -->;
            <a href="." aria-label="Marvel" class="navbar-brand navbar-brand-autodark me-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Marvel_Logo.svg" alt="Marvel"
                    class="navbar-brand-image" style="width: 96px; height: auto;">
            </a>
            <!-- END NAVBAR LOGO -->
            {{-- search bar --}}
            <div class="navbar-nav mx-auto w-50 py-2">
                {{-- dropdown --}}
                <div class="dropdown">
                    <a href="#" class="btn btn-light dropdown-toggle me-2" data-bs-toggle="dropdown">Kategori</a>
                    <div class="dropdown-menu dropdown-menu-card" style="min-width: 600px;">
                        <div class="p-3">
                            <div class="row g-2">
                                <div class="col-3">
                                    <div class="card py-2">
                                        <div class="card-body">
                                            Kategori 1
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card py-2">
                                        <div class="card-body">
                                            Kategori 2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card py-2">
                                        <div class="card-body">
                                            Kategori 3
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card py-2">
                                        <div class="card-body">
                                            Kategori 4
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card py-2">
                                        <div class="card-body">
                                            Kategori 5
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- search bar --}}
                <div class="input-icon w-100">
                    <input type="text" value="" class="form-control from-control-rounded"
                        placeholder="Cari Judul, Produk, Penulis..." />
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon">
                            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </span>
                </div>
                {{-- icon keranjang --}}
                <div class="ms-2 mt-3">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
            {{-- button login --}}
            <div class="flex-row order-md-last ms-auto">
                @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-light">Daftar</a>
                @else
                @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.book-categories.index') }}" class="btn btn-outline-primary me-1">Kategori Buku</a>
                <a href="{{ route('admin.subscription-packages.index') }}" class="btn btn-outline-primary me-1">Paket Langganan</a>
                @endif
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                @endguest
            </div>
        </div>
    </header>

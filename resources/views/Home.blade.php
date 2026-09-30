@extends('layout.app')

@push('styles')
    <style>
        .slick-prev:before, .slick-next::before{
            color: #333;
        }

        .subscription-card {
            border: 0;
            min-height: 190px;
        }

        .subscription-card .card-body {
            align-items: center;
        }

        .subscription-price {
            color: #1f2937;
        }

        .home-content {
            width: min(100% - 2rem, 1200px);
            margin-inline: auto;
        }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <main class="home-content py-4">
    <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" aria-label="Slide 1"
                aria-current="true" class="active">
            </button>
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" alt
                    src="https://i.pinimg.com/1200x/24/07/81/240781609cd903f9dced6a4fe46945d9.jpg" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" alt
                    src="https://i.pinimg.com/1200x/ac/53/37/ac53379ae6fe90b30136e589b016dce3.jpg" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" alt
                    src="https://i.pinimg.com/1200x/66/87/46/66874610d28c42e093f95803d40475f6.jpg" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-sample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
            </span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-sample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="mt-4">
        <div class="d-flex align-items-center gap-2 mb-4">
            <span class="badge bg-yellow-lt text-yellow p-2"><i class="fa-solid fa-crown fs-3"></i></span>
            <h2 class="mb-0 text-dark">Paket Langganan</h2>
        </div>
        <div class="row g-4">
            @forelse ($packages as $package)
                @php
                    $cardColor = preg_match('/\A#[A-Fa-f0-9]{6}\z/', $package->color) ? $package->color : '#e8edf2';
                @endphp
                <div class="col-md-4">
                    <div class="card subscription-card h-100" style="background: linear-gradient(135deg, #ffffff, {{ $cardColor }} 100%);">
                        <div class="card-body d-flex flex-column text-center text-dark">
                            <h3 class="mb-2 fw-bold">{{ $package->name_package }}</h3>
                            <p class="text-secondary flex-grow-1">{{ $package->description }}</p>
                            <div>
                                <span class="text-secondary">Rp</span>
                                <span class="subscription-price fs-1 fw-bold">{{ number_format($package->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-secondary">Belum ada paket langganan.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- buku terbaru --}}

    <div id="books" class="mt-4">
        <div class="d-flex align-items-center gap-2 mb-4">
            <h2 class="mt-3 text-dark">Buku Baru Di Rilis</h2>
        </div>
        <div id="wrapper-slider" class="responsive">
            <div class="px-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://static.yoursurprise.com/galleryimage/3b/3b049e11336dd1012c889fbd0f5427df/personalised-greeting-card-m-portrait.png?width=900&crop=1%3A1&bg-color=F5ECE6&format=jpg" class="d-block mx-auto w-75 h-50">
                        <div class="d-flex gap-2 mt-2">
                            <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                            <p class="badge">3<</p>
                        </div>
                        <div>
                            <h5><span style="font-size: 0.8rem" class="text-secondary">fazriel</span>
                                <br><span style="font-size: 1rem">card with title</span>
                            </h5>
                            <h4 style="font-size: 1.2rem; font-weight: bold">Rp. 80.000</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://static.yoursurprise.com/galleryimage/3b/3b049e11336dd1012c889fbd0f5427df/personalised-greeting-card-m-portrait.png?width=900&crop=1%3A1&bg-color=F5ECE6&format=jpg" class="d-block mx-auto w-75 h-50">
                        <div class="d-flex gap-2 mt-2">
                            <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                            <p class="badge">3<</p>
                        </div>
                        <div>
                            <h5><span style="font-size: 0.8rem" class="text-secondary">fazriel</span>
                                <br><span style="font-size: 1rem">card with title</span>
                            </h5>
                            <h4 style="font-size: 1.2rem; font-weight: bold">Rp. 80.000</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://static.yoursurprise.com/galleryimage/3b/3b049e11336dd1012c889fbd0f5427df/personalised-greeting-card-m-portrait.png?width=900&crop=1%3A1&bg-color=F5ECE6&format=jpg" class="d-block mx-auto w-75 h-50">
                        <div class="d-flex gap-2 mt-2">
                            <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                            <p class="badge">3</p>
                        </div>
                        <div>
                            <h5><span style="font-size: 0.8rem" class="text-secondary">fazriel</span>
                                <br><span style="font-size: 1rem">card with title</span>
                            </h5>
                            <h4 style="font-size: 1.2rem; font-weight: bold">Rp. 80.000</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://static.yoursurprise.com/galleryimage/3b/3b049e11336dd1012c889fbd0f5427df/personalised-greeting-card-m-portrait.png?width=900&crop=1%3A1&bg-color=F5ECE6&format=jpg" class="d-block mx-auto w-75 h-50">
                        <div class="d-flex gap-2 mt-2">
                            <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                            <p class="badge">3<</p>
                        </div>
                        <div>
                            <h5><span style="font-size: 0.8rem" class="text-secondary">Fazriel</span>
                                <br><span style="font-size: 1rem">card with title</span>
                            </h5>
                            <h4 style="font-size: 1.2rem; font-weight: bold">Rp. 80.000</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://static.yoursurprise.com/galleryimage/3b/3b049e11336dd1012c889fbd0f5427df/personalised-greeting-card-m-portrait.png?width=900&crop=1%3A1&bg-color=F5ECE6&format=jpg" class="d-block mx-auto w-75 h-50">
                        <div class="d-flex gap-2 mt-2">
                            <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                            <p class="badge">3<</p>
                        </div>
                        <div>
                            <h5><span style="font-size: 0.8rem" class="text-secondary">Fazriel</span>
                                <br><span style="font-size: 1rem">card with title</span>
                            </h5>
                            <h4 style="font-size: 1.2rem; font-weight: bold">Rp. 80.000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- buku gratis --}}

<div class="mt-4">
    {{-- judul --}}
    <div class="d-flex align-items-center gap-2 mb-4">
        <h2 class="mt-3 text-dark" style="font-weight: bold">Buku Gratis</h2>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card d-flex flex-column">
                <div class="row row-0 flex-fill">
                    <div class="col-md-3">
                        <a href="a">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRXrsS4fMkYjnRwStAMeeaI8J1HAmEabjr8qGnaZ8KfQ&s=10" class="w-100 h-100 object-cover" alt="card side image">
                        </a>
                    </div>
                    <div class="col">
                        <div class="card-body h-full d-flex flex-column">
                            <h3 class="card-title">
                                <div class="badge"><i class="fa-solid fa-mobile"></i></div>
                            </h3>
                            <div class="text-secondary">
                                penulis
                                <br><span class="text-dark">Judul Buku</span>
                            </div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <h3 class="card-title">
                                    <span class="text-decoration-line-through text-secondary">Rp.999.000</span>
                                    <span class="text-dark"> Rp 0</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-4">
            <div class="card d-flex flex-column">
                <div class="row row-0 flex-fill">
                    <div class="col-md-3">
                        <a href="a">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRXrsS4fMkYjnRwStAMeeaI8J1HAmEabjr8qGnaZ8KfQ&s=10" class="w-100 h-100 object-cover" alt="card side image">
                        </a>
                    </div>
                    <div class="col">
                        <div class="card-body h-full d-flex flex-column">
                            <h3 class="card-title">
                                <div class="badge"><i class="fa-solid fa-mobile"></i></div>
                            </h3>
                            <div class="text-secondary">
                                penulis
                                <br><span class="text-dark">Judul Buku</span>
                            </div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <h3 class="card-title">
                                    <span class="text-decoration-line-through text-secondary">Rp.999.000</span>
                                    <span class="text-dark"> Rp 0</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-4">
            <div class="card d-flex flex-column">
                <div class="row row-0 flex-fill">
                    <div class="col-md-3">
                        <a href="a">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRXrsS4fMkYjnRwStAMeeaI8J1HAmEabjr8qGnaZ8KfQ&s=10" class="w-100 h-100 object-cover" alt="card side image">
                        </a>
                    </div>
                    <div class="col">
                        <div class="card-body h-full d-flex flex-column">
                            <h3 class="card-title">
                                <div class="badge"><i class="fa-solid fa-mobile"></i></div>
                            </h3>
                            <div class="text-secondary">
                                penulis
                                <br><span class="text-dark">Judul Buku</span>
                            </div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <h3 class="card-title">
                                    <span class="text-decoration-line-through text-secondary">Rp.999.000</span>
                                    <span class="text-dark"> Rp 0</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-4">
            <div class="card d-flex flex-column">
                <div class="row row-0 flex-fill">
                    <div class="col-md-3">
                        <a href="a">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRXrsS4fMkYjnRwStAMeeaI8J1HAmEabjr8qGnaZ8KfQ&s=10" class="w-100 h-100 object-cover" alt="card side image">
                        </a>
                    </div>
                    <div class="col">
                        <div class="card-body h-full d-flex flex-column">
                            <h3 class="card-title">
                                <div class="badge"><i class="fa-solid fa-mobile"></i></div>
                            </h3>
                            <div class="text-secondary">
                                penulis
                                <br><span class="text-dark">Judul Buku</span>
                            </div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <h3 class="card-title">
                                    <span class="text-decoration-line-through text-secondary">Rp.999.000</span>
                                    <span class="text-dark"> Rp 0</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-4">
            <div class="card d-flex flex-column">
                <div class="row row-0 flex-fill">
                    <div class="col-md-3">
                        <a href="a">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRXrsS4fMkYjnRwStAMeeaI8J1HAmEabjr8qGnaZ8KfQ&s=10" class="w-100 h-100 object-cover" alt="card side image">
                        </a>
                    </div>
                    <div class="col">
                        <div class="card-body h-full d-flex flex-column">
                            <h3 class="card-title">
                                <div class="badge"><i class="fa-solid fa-mobile"></i></div>
                            </h3>
                            <div class="text-secondary">
                                penulis
                                <br><span class="text-dark">Judul Buku</span>
                            </div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <h3 class="card-title">
                                    <span class="text-decoration-line-through text-secondary">Rp.999.000</span>
                                    <span class="text-dark"> Rp 0</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-4">
            <div class="card d-flex flex-column">
                <div class="row row-0 flex-fill">
                    <div class="col-md-3">
                        <a href="a">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRXrsS4fMkYjnRwStAMeeaI8J1HAmEabjr8qGnaZ8KfQ&s=10" class="w-100 h-100 object-cover" alt="card side image">
                        </a>
                    </div>
                    <div class="col">
                        <div class="card-body h-full d-flex flex-column">
                            <h3 class="card-title">
                                <div class="badge"><i class="fa-solid fa-mobile"></i></div>
                            </h3>
                            <div class="text-secondary">
                                penulis
                                <br><span class="text-dark">Judul Buku</span>
                            </div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <h3 class="card-title">
                                    <span class="text-decoration-line-through text-secondary">Rp.999.000</span>
                                    <span class="text-dark"> Rp 0</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>

@endsection

@push('scripts')
<script>

    $(document).ready(function(){
    $('.responsive').slick({
    arrows: false,
    dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    });
</script>
@endpush

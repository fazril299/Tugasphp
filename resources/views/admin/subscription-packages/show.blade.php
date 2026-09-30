@extends('layout.app')

@section('content')
    <main class="container-xl py-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <h1 class="h2 mb-0">Detail Paket Langganan</h1>
            <a href="{{ route('admin.subscription-packages.edit', $subcriptionPackage) }}" class="btn btn-primary">Edit Paket</a>
        </div>

        <dl class="row">
            <dt class="col-sm-3">Nama paket</dt>
            <dd class="col-sm-9">{{ $subcriptionPackage->name_package }}</dd>
            <dt class="col-sm-3">Deskripsi</dt>
            <dd class="col-sm-9">{{ $subcriptionPackage->description }}</dd>
            <dt class="col-sm-3">Harga</dt>
            <dd class="col-sm-9">Rp {{ number_format($subcriptionPackage->price, 0, ',', '.') }}</dd>
            <dt class="col-sm-3">Warna</dt>
            <dd class="col-sm-9">
                <span class="d-inline-block rounded border" style="width: 1.5rem; height: 1.5rem; background-color: {{ preg_match('/\A#[A-Fa-f0-9]{6}\z/', $subcriptionPackage->color) ? $subcriptionPackage->color : '#e8edf2' }}" aria-label="Warna paket"></span>
                {{ $subcriptionPackage->color }}
            </dd>
        </dl>

        <a href="{{ route('admin.subscription-packages.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
    </main>
@endsection

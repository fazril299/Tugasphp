@extends('layout.app')

@section('content')
    <main class="container-xl py-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <h1 class="h2 mb-0">Detail Kategori Buku</h1>
            <a href="{{ route('admin.book-categories.edit', $bookCategory) }}" class="btn btn-primary">Edit Kategori</a>
        </div>

        <dl class="row">
            <dt class="col-sm-3">Nama kategori</dt>
            <dd class="col-sm-9">{{ $bookCategory->name }}</dd>
            <dt class="col-sm-3">Jumlah buku</dt>
            <dd class="col-sm-9">{{ $bookCategory->books()->count() }}</dd>
        </dl>

        <a href="{{ route('admin.book-categories.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
    </main>
@endsection

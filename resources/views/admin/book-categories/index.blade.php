@extends('layout.app')

@section('content')
    <main class="container-xl py-5">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5">
            <h1 class="fs-2 fw-normal mb-0">Kategori Buku</h1>
            <a href="{{ route('admin.book-categories.create') }}" class="btn btn-primary px-4 py-2">Tambah Data</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase">No</th>
                                <th class="text-uppercase">Nama Kategori</th>
                                <th class="text-uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookCategories as $bookCategory)
                                <tr>
                                    <td>{{ $bookCategories->firstItem() + $loop->index }}</td>
                                    <td>{{ $bookCategory->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.book-categories.edit', $bookCategory) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                            <form method="POST" action="{{ route('admin.book-categories.destroy', $bookCategory) }}" onsubmit="return confirm('Hapus kategori ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-secondary py-4">Belum ada kategori buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $bookCategories->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection

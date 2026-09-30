@extends('layout.app')

@section('content')
    <main class="container-xl py-5">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5">
            <h1 class="fs-2 fw-normal mb-0">Paket Langganan</h1>
            <a href="{{ route('admin.subscription-packages.create') }}" class="btn btn-primary px-4 py-2">Tambah Data</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase">No</th>
                                <th class="text-uppercase">Nama Paket</th>
                                <th class="text-uppercase">Deskripsi</th>
                                <th class="text-uppercase">Harga</th>
                                <th class="text-uppercase">Warna</th>
                                <th class="text-uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscriptionPackages as $subcriptionPackage)
                                <tr>
                                    <td>{{ $subscriptionPackages->firstItem() + $loop->index }}</td>
                                    <td>{{ $subcriptionPackage->name_package }}</td>
                                    <td>{{ $subcriptionPackage->description }}</td>
                                    <td>Rp {{ number_format($subcriptionPackage->price, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                            $packageColor = preg_match('/\A#[A-Fa-f0-9]{6}\z/', $subcriptionPackage->color) ? $subcriptionPackage->color : '#e8edf2';
                                        @endphp
                                        <span class="d-inline-block rounded-2 border" style="width: 1.5rem; height: 1.5rem; background-color: {{ $packageColor }}" aria-label="Warna {{ $subcriptionPackage->name_package }}"></span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.subscription-packages.edit', $subcriptionPackage) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                            <form method="POST" action="{{ route('admin.subscription-packages.destroy', $subcriptionPackage) }}" onsubmit="return confirm('Hapus paket langganan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-4">Belum ada paket langganan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $subscriptionPackages->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection

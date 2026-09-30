@extends('layout.app')

@section('content')
    <main class="admin-form-page">
        <section class="card admin-form-card">
            <header class="card-header">
                <h1 class="h2 mb-0">Tambah Paket Langganan</h1>
            </header>
            <div class="card-body">
                @include('admin.subscription-packages._form', [
                    'action' => route('admin.subscription-packages.store'),
                    'method' => 'POST',
                    'subcriptionPackage' => null,
                ])
            </div>
        </section>
    </main>
@endsection

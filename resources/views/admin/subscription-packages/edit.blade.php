@extends('layout.app')

@section('content')
    <main class="admin-form-page">
        <section class="card admin-form-card">
            <header class="card-header">
                <h1 class="h2 mb-0">Edit Paket Langganan</h1>
            </header>
            <div class="card-body">
                @include('admin.subscription-packages._form', [
                    'action' => route('admin.subscription-packages.update', $subcriptionPackage),
                    'method' => 'PUT',
                    'subcriptionPackage' => $subcriptionPackage,
                ])
            </div>
        </section>
    </main>
@endsection

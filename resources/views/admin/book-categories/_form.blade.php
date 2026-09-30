<form method="POST" action="{{ $action }}">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Nama kategori</label>
        <input id="name" name="name" type="text" value="{{ old('name', $bookCategory?->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Fiksi" maxlength="255" required autofocus>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 py-2">
            {{ $method === 'POST' ? 'Simpan Kategori' : 'Simpan Perubahan' }}
        </button>
        <a href="{{ route('admin.book-categories.index') }}" class="btn btn-outline-secondary px-4 py-2">Kembali ke daftar</a>
    </div>
</form>

<form method="POST" action="{{ $action }}">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="mb-3">
        <label for="name_package" class="form-label">Nama paket</label>
        <input id="name_package" name="name_package" type="text" value="{{ old('name_package', $subcriptionPackage?->name_package) }}" class="form-control @error('name_package') is-invalid @enderror" maxlength="255" required autofocus>
        @error('name_package')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $subcriptionPackage?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="color" class="form-label">Warna kartu</label>
            <input id="color" name="color" type="color" value="{{ old('color', $subcriptionPackage?->color ?: '#26e3b3') }}" class="form-control form-control-color @error('color') is-invalid @enderror" required>
            @error('color')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input id="price" name="price" type="number" value="{{ old('price', $subcriptionPackage?->price) }}" class="form-control @error('price') is-invalid @enderror" min="0" step="1" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
    </div>
</form>

<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <form action="{{ route('skincare.update', $skincare->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $skincare->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                name="brand" value="{{ old('brand', $skincare->brand) }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Jenis Produk</label>
            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                @foreach (['Pembersih', 'Penyegar', 'Serum', 'Pelembab', 'Tabir Surya'] as $t)
                    <option value="{{ $t }}" {{ old('type', $skincare->type) == $t ? 'selected' : '' }}>
                        {{ $t }}
                    </option>
                @endforeach
            </select>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="skin_type" class="form-label">Jenis Kulit</label>
            <select class="form-control @error('skin_type') is-invalid @enderror" id="skin_type" name="skin_type">
                @foreach (['Kering', 'Berminyak', 'Kombinasi', 'Sensitif'] as $st)
                    <option value="{{ $st }}"
                        {{ old('skin_type', $skincare->skin_type) == $st ? 'selected' : '' }}>
                        {{ $st }}
                    </option>
                @endforeach
            </select>
            @error('skin_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="expired_date" class="form-label">Tanggal Kadaluarsa</label>
            <input type="date" class="form-control @error('expired_date') is-invalid @enderror" id="expired_date"
                name="expired_date" value="{{ old('expired_date', $skincare->expired_date) }}">
            @error('expired_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
        <a class="btn btn-secondary" href="{{ route('skincare.index') }}" role="button">Batal</a>
    </form>
</x-app>

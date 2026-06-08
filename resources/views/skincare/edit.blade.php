<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <form action="{{ route('skincare.update', $skincare->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $skincare->name) }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"
                value="{{ old('brand', $skincare->brand) }}">

            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Produk</label>

            <select name="type" class="form-control @error('type') is-invalid @enderror">

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
            <label class="form-label">Jenis Kulit</label>

            <select name="skin_type" class="form-control @error('skin_type') is-invalid @enderror">

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
            <label class="form-label">Tanggal Kadaluarsa</label>

            <input type="date" name="expired_date" class="form-control @error('expired_date') is-invalid @enderror"
                value="{{ old('expired_date', $skincare->expired_date) }}">

            @error('expired_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>

            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $skincare->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('skincare.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</x-app>

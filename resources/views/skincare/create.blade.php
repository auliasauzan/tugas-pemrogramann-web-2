<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <form action="{{ route('skincare.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">

                <option value="">-- Pilih Category --</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"
                value="{{ old('brand') }}">

            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label class="form-label">Skin Type</label>

            <select name="skin_type" class="form-control @error('skin_type') is-invalid @enderror">

                <option value="">-- Pilih Skin Type --</option>
                <option value="Kering">Kering</option>
                <option value="Berminyak">Berminyak</option>
                <option value="Kombinasi">Kombinasi</option>
                <option value="Sensitif">Sensitif</option>

            </select>

            @error('skin_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Expired Date</label>
            <input type="date" name="expired_date" class="form-control @error('expired_date') is-invalid @enderror"
                value="{{ old('expired_date') }}">

            @error('expired_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('skincare.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</x-app>

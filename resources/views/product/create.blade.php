<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Product</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}">
        </div>

        <div class="mb-3">
            <label>Skin Type</label>
            <input type="text" name="skin_type" class="form-control" value="{{ old('skin_type') }}">
        </div>

        <div class="mb-3">
            <label>Expired Date</label>
            <input type="date" name="expired_date" class="form-control" value="{{ old('expired_date') }}">
        </div>

        {{-- RELASI CATEGORY --}}
        <div class="mb-3">
            <label>Category</label>

            <select name="category_id" class="form-control">
                <option value="">Pilih Category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Shelf Life</label>
            <input type="text" name="shelf_life" class="form-control" placeholder="Contoh: 12M">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('product.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</x-app>

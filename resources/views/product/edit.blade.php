<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Product</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand) }}">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $product->type) }}">
        </div>

        <div class="mb-3">
            <label>Skin Type</label>
            <input type="text" name="skin_type" class="form-control"
                value="{{ old('skin_type', $product->skin_type) }}">
        </div>

        <div class="mb-3">
            <label>Expired Date</label>
            <input type="date" name="expired_date" class="form-control"
                value="{{ old('expired_date', $product->expired_date) }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('product.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</x-app>

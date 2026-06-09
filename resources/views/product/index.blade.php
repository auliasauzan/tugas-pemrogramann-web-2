<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    <a href="{{ route('product.trash') }}" class="btn btn-dark mb-3">
        Trash
    </a>

    {{-- Search dan Filter --}}
    <form action="{{ route('product.index') }}" method="GET" class="row mb-3">

        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Search product..."
                value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="category_id" class="form-control">

                <option value="">-- Semua Category --</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="col-md-3">
            <button type="submit" class="btn btn-success w-100">
                Search
            </button>
        </div>

    </form>

    {{-- List Product --}}
    <ul class="list-group">

        @forelse ($products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    {{ $products->firstItem() + $loop->index }}.

                    {{ $product->name }}
                    -
                    {{ $product->brand }}
                    -
                    {{ $product->type }}
                    -
                    {{ $product->skin_type }}
                    -
                    {{ $product->expired_date }}
                    -
                    {{ $product->shelf_life ?? 'KOSONG' }}
                    -
                    {{ $product->category->name ?? '-' }}
                </div>

                <div>

                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm text-white">
                        Detail
                    </a>

                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus data?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </form>

                </div>

            </li>

        @empty

            <li class="list-group-item text-center">
                Data tidak ditemukan
            </li>
        @endforelse

    </ul>

    {{-- Pagination --}}
    <div class="mt-3 d-flex justify-content-between align-items-center">

        <div>
            Showing {{ $products->firstItem() ?? 0 }}
            to {{ $products->lastItem() ?? 0 }}
            of {{ $products->total() }} results
        </div>

        <div>
            {{ $products->withQueryString()->links() }}
        </div>

    </div>

</x-app>

<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Tombol Create --}}
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    {{-- Search + Filter --}}
    <form action="{{ route('product.index') }}" method="GET" class="mb-4">
        <div class="row">

            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari Product..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select name="category_id" class="form-control">

                    <option value="">
                        Semua Category
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-4">
                <button class="btn btn-success w-100">
                    Search
                </button>
            </div>

        </div>
    </form>

    {{-- List Product --}}
    <ul class="list-group mb-4">

        @foreach ($products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    {{ $loop->iteration }}.
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
                    {{ $product->category->name }}
                </div>

                <div>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>


                </div>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus data?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                    </button>



                </form>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm text-white">
                    Detail
                </a>

            </li>
        @endforeach

    </ul>

    {{-- Pagination --}}
    <div class="d-flex justify-content-between align-items-center">

        <div>
            Showing {{ $products->firstItem() }}
            to {{ $products->lastItem() }}
            of {{ $products->total() }} results
        </div>

        <div>
            {{ $products->links() }}
        </div>

    </div>

</x-app>

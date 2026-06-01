<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    <form action="{{ route('product.index') }}" method="GET" class="mb-4">
        <div class="row">

            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari Product..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select name="category_id" class="form-control">

                    <option value="">
                        Semua Categoryy
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

    <ul class="list-group mb-4">

        @foreach ($products as $product)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $product->name }}
                --
                {{ $product->brand }}
                --
                {{ $product->type }}
                --
                {{ $product->skin_type }}
                --
                {{ $product->expired_date }}
                --
                {{ $product->category->name }}
            </li>
        @endforeach

    </ul>

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

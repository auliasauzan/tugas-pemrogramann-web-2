<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <a href="{{ route('product.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="list-group">

        @forelse($products as $product)
            <div class="list-group-item">
                <strong>{{ $product->name }}</strong><br>

                Brand : {{ $product->brand }} <br>
                Type : {{ $product->type }} <br>
                Shelf Life : {{ $product->shelf_life }}
            </div>

        @empty

            <div class="list-group-item">
                Tidak ada data di trash
            </div>
        @endforelse

    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>

</x-app>

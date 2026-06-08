<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="card">
        <div class="card-body">



            <p><strong>Brand:</strong> {{ $product->brand }}</p>

            <p><strong>Type:</strong> {{ $product->type }}</p>

            <p><strong>Skin Type:</strong> {{ $product->skin_type }}</p>

            <p><strong>Expired Date:</strong> {{ $product->expired_date }}</p>

            <p><strong>Category:</strong> {{ $product->category->name }}</p>

            <p><strong>Shelf Life:</strong>{{ $product->shelf_life }}</p>

        </div>
    </div>


    <a href="{{ route('product.index') }}" class="btn btn-secondary">
        Kembali
    </a>

</x-app>

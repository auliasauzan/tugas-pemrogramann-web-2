<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <a href="{{ route('product.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="list-group">

        @forelse($products as $product)
            <div class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    <strong>{{ $product->name }}</strong><br>

                    Brand : {{ $product->brand }} <br>
                    Type : {{ $product->type }} <br>
                    Shelf Life : {{ $product->shelf_life }}
                </div>

                <div>
                    <form action="{{ route('product.restore', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button class="btn btn-success btn-sm">
                            Restore
                        </button>
                    </form>
                </div>

            </div>

            <div>

                <form action="{{ route('product.restore', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')

                    <button class="btn btn-success btn-sm">
                        Restore
                    </button>
                </form>

                <form action="{{ route('product.forceDelete', $product->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus permanen?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Hapus Permanen
                    </button>

                </form>

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

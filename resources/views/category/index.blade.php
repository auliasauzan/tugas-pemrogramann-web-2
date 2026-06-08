<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Tombol Create --}}
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    {{-- Search --}}
    <form action="{{ route('category.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari Category..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">
                    Search
                </button>
            </div>
        </div>
    </form>

    {{-- List Data --}}
    <ul class="list-group mb-4">
        @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    {{ $loop->iteration }}.
                    {{ $category->name }}
                    -
                    {{ $category->description }}
                    -
                    {{ $category->code }}
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm text-white">
                        Detail
                    </a>

                    <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </div>

            </li>
        @endforeach
    </ul>

    <div class="d-flex justify-content-between align-items-center">
        <div>
            Menampilkan {{ $categories->firstItem() }}
            sampai {{ $categories->lastItem() }}
            dari total {{ $categories->total() }} data
        </div>

        <div>
            {{ $categories->appends(request()->query())->links() }}
        </div>
    </div>

</x-app>

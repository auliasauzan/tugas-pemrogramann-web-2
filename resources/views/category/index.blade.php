<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Alert Success --}}
    @session('success')
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endsession

    {{-- Tombol Create --}}
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    {{-- Search --}}
    <form action="{{ route('category.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari category..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <button class="btn btn-success w-100">
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

                    {{-- Tombol Edit --}}
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm text-white">
                            Detail
                        </a>

                    </form>

                </div>

            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    <div class="d-flex justify-content-between align-items-center">
        <div>
            Showing {{ $categories->firstItem() }}
            to {{ $categories->lastItem() }}
            of {{ $categories->total() }} results
        </div>

        <div>
            {{ $categories->links() }}
        </div>
    </div>

</x-app>

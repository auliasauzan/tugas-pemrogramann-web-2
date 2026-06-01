<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

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

                <div>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>
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

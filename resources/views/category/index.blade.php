<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Search --}}
    <form action="{{ route('category.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Search category name ..."
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
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $category->name }}
                --
                {{ $category->description }}
                --
                {{ $category->code }}
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

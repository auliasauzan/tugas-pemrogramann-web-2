<x-app>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <h3>Edit Category</h3>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Category</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $category->code) }}">
        </div>

        <button type="submit" class="btn btn-warning">
            Update
        </button>
    </form>
</x-app>

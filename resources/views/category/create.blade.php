<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">
                Category Name
            </label>

            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                Description
            </label>

            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                Code
            </label>

            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                value="{{ old('code') }}">

            @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</x-app>

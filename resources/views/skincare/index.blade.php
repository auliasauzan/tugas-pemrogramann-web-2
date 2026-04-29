<x-app>

    <x-slot name="title">{{ $title }}</x-slot>

    {{-- <ul class="list-group">
        @foreach ($skincares as $skincare)
            <li class="list-group-item">
                {{ $skincare->id }} -- {{ $skincare->name }}
            </li>
        @endforeach
    </ul> --}}

    @session('success')
        <div class="alert alert-success alert-dismissible fade show p-3 mb-4" role="alert">
            <strong>Berhasil!</strong> {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <a class="btn btn-primary mb-4" href="{{ route('skincare.create') }}" role="button">Tambah Skincare</a>


    <ul class="list-group">
        @foreach ($skincares as $skincare)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    {{ $skincare->id }} -- {{ $skincare->name }} -- {{ $skincare->brand }} -- {{ $skincare->type }} --
                    {{ $skincare->skin_type }} -- {{ $skincare->expired_date }}
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('skincare.edit', $skincare->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('skincare.destroy', $skincare->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-app>

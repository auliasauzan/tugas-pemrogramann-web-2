<x-app>
    <x-slot:title>{{ $title }}</x-slot>



    <a href="{{ route('skincare.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    <ul class="list-group mb-4">
        @foreach ($skincares as $skincare)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    {{ $loop->iteration }}.
                    {{ $skincare->name }}
                    -
                    {{ $skincare->brand }}
                    -
                    {{ $skincare->type }}
                    -
                    {{ $skincare->skin_type }}
                    -
                    {{ $skincare->expired_date }}
                    -
                    {{ $skincare->category->name ?? 'Tidak Ada Category' }}
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('skincare.edit', $skincare->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('skincare.destroy', $skincare->id) }}" method="POST"
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

</x-app>

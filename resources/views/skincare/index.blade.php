<x-app>

    <x-slot name="title">{{ $title }}</x-slot>

    {{-- <ul class="list-group">
        @foreach ($skincares as $skincare)
            <li class="list-group-item">
                {{ $skincare->id }} -- {{ $skincare->name }}
            </li>
        @endforeach
    </ul> --}}


    <ul class="list-group">
        @foreach ($skincares as $skincare)
            <li class="list-group-item">
                {{ $skincare->id }} -- {{ $skincare->name }} -- {{ $skincare->brand }} -- {{ $skincare->type }} --
                {{ $skincare->skin_type }} -- {{ $skincare->expired_date }}
            </li>
        @endforeach
    </ul>
</x-app>

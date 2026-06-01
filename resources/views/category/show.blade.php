<x-app>
    <x-slot name="title">{{ $title }}</x-slot>

    <table class="table table-bordered">

        <tr>
            <td width="200">
                <strong>Nama:</strong>
            </td>
            <td>
                {{ $category->name }}
            </td>
        </tr>

        <tr>
            <td>
                <strong>Description:</strong>
            </td>
            <td>
                {{ $category->description }}
            </td>
        </tr>

        <tr>
            <td>
                <strong>Code:</strong>
            </td>
            <td>
                {{ $category->code }}
            </td>
        </tr>

        <tr>
            <td>
                <strong>Dibuat:</strong>
            </td>
            <td>
                {{ $category->created_at }}
            </td>
        </tr>

        <tr>
            <td>
                <strong>Update:</strong>
            </td>
            <td>
                {{ $category->updated_at->diffForHumans() }}
            </td>
        </tr>

    </table>

    <a href="{{ route('category.index') }}" class="btn btn-warning">
        Back
    </a>

</x-app>

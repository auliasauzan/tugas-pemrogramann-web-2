<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                TOKO BEAUTY
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('skincare.index') }}">
                            Skincare
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            Category
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('product.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('product.index') }}">
                            Product
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    {{-- Header Judul --}}
    <div class="bg-primary text-white text-center py-5">
        <h1 class="fw-bold display-4">
            {{ $title }}
        </h1>
    </div>

    <div class="container my-4">

        {{-- Alert Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Alert Error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div> --}}
        @endif

        {{ $slot }}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

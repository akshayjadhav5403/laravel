<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel Role App') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Laravel Role App</a>
        <div class="d-flex">
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        @auth
            <div class="col-md-3 mb-4">
                @include('partials.sidebar')
            </div>
        @endauth
        <div class="col">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

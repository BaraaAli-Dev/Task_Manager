<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>@yield('title', 'Title')</title>
</head>

<body>
    @auth
        <nav class="navbar navbar-expand-lg bg-secondary text-light">
            <div class="container">
                <a class="navbar-brand text-light fw-bold" href="{{ route('dashboard') }}">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-primary-emphasis fw-bold" aria-current="page"
                                href="{{ route('show-add-project') }}">Add
                                Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex">
                        @csrf
                        <input class="form-control me-2 bg-danger text-light" type="submit" value="Logout" />
                    </form>
                </div>
            </div>
        </nav>
    @endauth
    @yield('content')
</body>

</html>

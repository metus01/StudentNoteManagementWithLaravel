<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')|Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    .form-control
    {
        outline: none;
        box-shadow: none
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
           <a class="navbar-brand" href="/" style="font-size: 2rem">X-bahut</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.fil.index') }}">Filières</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.mat.index') }}">Matières</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.prof.index') }}">Profs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.year.index') }}">Années</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.link.create') }}">Liaison</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-secondary fw-bold">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (session('success'))
        <h5 class="text  text-success text-center mt-4"> {{ session('success')}}</h5>
    @endif
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

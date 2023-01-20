<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('dashboard') }}/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/dashboard.css" rel="stylesheet">


</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="text-light lead me-3">
                {{ auth()->user()->name }}
            </div>
            <div class="nav-item text-nowrap">
                <a class="btn btn-danger me-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>


    <script src="{{ asset('dashboard') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/jquery-3.6.3.min.js"></script>
    @stack('js')
</body>

</html>

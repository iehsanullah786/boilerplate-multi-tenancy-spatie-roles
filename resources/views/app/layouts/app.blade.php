<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-light min-vh-100">


        <div class="container-fluid min-vh-100">
            <div class="row min-vh-100">
                <!-- Sidebar -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white collapse ">
                    <div class="position-sticky pt-3 ">
                        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Menu</span>
                        </h5>
                        <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                                <a class="nav-link text-white active" aria-current="page" href="{{ route('dashboard') }}">
                                    <img src="logo.png" width="100px">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white active" aria-current="page" href="{{ route('dashboard') }}">
                                    <i class="bi bi-house-door-fill"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('users.index') }}">
                                    <i class="bi bi-people-fill"></i> Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('roles.index') }}">
                                    <i class="bi bi-shield-lock-fill"></i> Roles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('permissions.index') }}">
                                    <i class="bi bi-key-fill"></i> Permissions
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('profile.edit')}}">
                                    <i class="bi bi-person-fill"></i> Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                <a class="nav-link text-white" >
                                    <button type="submit" class="bi-box-arrow-right"> Logout </button>
                                </form>

                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-white pt-5">

                    
                    <!-- Place your content here -->
                    {{ $slot }}

                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>

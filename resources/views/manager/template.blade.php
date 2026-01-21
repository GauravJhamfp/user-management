<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manager Panel')</title>
    @include('partials.styles')
    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            min-height: 100vh;
            width: 250px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .content {
                margin-left: 0;
            }
        }

    </style>
</head>
<body class="bg-light">

    <div class="d-flex">

        <!-- Sidebar -->
        <nav class="sidebar bg-white shadow-lg p-3 position-fixed">
            <div class="mb-4 text-center">
                <h4 class="fw-bold">Manager Panel</h4>
            </div>

            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('home') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark fw-semibold" href="">
                        Users
                    </a>
                </li>
                <!-- Add more links here if needed -->
                <li class="nav-item mt-4">
                    <a class="nav-link text-danger fw-semibold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="content flex-grow-1">
            @yield('content')
        </div>

    </div>

    @include('partials.scripts')
    <script>
        // Optional: collapse sidebar on small screens

    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PerpusKU | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css"
    />

    <style>
        /* Sidebar styling */
        .sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            min-height: 100vh;
            position: sticky;
            top: 0;
            box-shadow: 2px 0 6px rgb(0 0 0 / 0.05);
            overflow-y: auto;
        }

        /* Sidebar link hover effect */
        .sidebar a {
            color: #333;
            font-weight: 500;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0d6efd;
            color: white !important;
        }

        /* Navbar brand font-weight and spacing */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.05em;
        }

        /* Offcanvas wider on mobile */
        .offcanvas-body {
            padding: 1rem;
        }
        .offcanvas {
            width: 280px;
        }

        /* Content padding */
        .content {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* Scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 8px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(13,110,253,0.3);
            border-radius: 4px;
        }

        /* Responsive tweaks */
        @media (max-width: 991.98px) {
            .content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="main d-flex flex-column min-vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PerpusKU</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar"
                    aria-controls="sidebar"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <!-- Mobile Sidebar (Offcanvas) -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-lg-none">
                @include('partials.sidebar-links')
            </div>
        </div>

        <!-- Content Layout -->
        <div class="body-content flex-grow-1">
            <div class="row g-0 h-100">
                <!-- Desktop Sidebar -->
                <nav class="sidebar col-lg-2 d-none d-lg-flex flex-column p-3 w-auto">
                    @include('partials.sidebar-links')
                </nav>

                <!-- Main Content -->
                <main class="content col-12 col-lg-10 w-75">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

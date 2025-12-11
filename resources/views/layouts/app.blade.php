<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title') - PropertiSmart</title>

    {{-- ICON --}}
    <link rel="icon" href="{{ asset('assets/logo.png') }}">

    {{-- ADMIN CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    {{-- BOXCICONS --}}
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    <section class="home-section">
        {{-- NAV TOP --}}
        <nav class="topbar">
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>

            <div class="profile-details">
                <span class="admin_name">Admin PropertiSmart</span>
            </div>
        </nav>

        {{-- MAIN CONTENT --}}
        <div class="home-content">
            @yield('content')
        </div>
    </section>

    <style>
        .home-section {
            margin-left: 250px;
            transition: 0.4s;
        }

        .topbar {
            width: 100%;
            background: #004080;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .home-content {
            padding: 25px;
        }
    </style>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");

        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>

</body>

</html>

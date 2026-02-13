<!DOCTYPE html>
<html lang="en">

<head>
    <title>Brooklyn Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Inter, sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #0b1c2d;
            color: white;
            padding: 30px 18px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h4 {
            color: #d4af37;
            margin-bottom: 35px;
            font-weight: 700;
            text-align: center;
        }

        .sidebar a {
            color: #cfd8e3;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: .2s;
            font-size: 15px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #d4af37;
            color: #0b1c2d;
        }

        .sidebar hr {
            border-color: rgba(255, 255, 255, .1);
            margin: 20px 0;
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            padding: 30px 40px;
        }

        /* TOPBAR */
        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h5 {
            margin: 0;
            font-weight: 600;
        }

        /* DASH CARD */
        .dash-card {
            background: #fff;
            padding: 26px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            text-align: center;
            transition: .3s;
        }

        .dash-card:hover {
            transform: translateY(-6px);
        }

        .dash-card span {
            font-size: 14px;
            color: #777;
        }

        .dash-card h2 {
            font-size: 36px;
            margin-top: 8px;
            font-weight: 700;
        }

        /* QUICK MENU */
        .quick-menu {
            display: block;
            background: #0b1c2d;
            color: #fff;
            padding: 20px;
            border-radius: 14px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            transition: .3s;
        }

        .quick-menu i {
            font-size: 22px;
            margin-bottom: 8px;
            display: block;
        }

        .quick-menu:hover {
            background: #d4af37;
            color: #000;
        }

        /* IMAGE PREVIEW */
        .img-preview {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 10px;
            display: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .15);
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <h4>Brooklyn Admin</h4>

        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fa fa-chart-line"></i> Dashboard
        </a>

        <a href="/admin/units" class="{{ request()->is('admin/units*') ? 'active' : '' }}">
            <i class="fa fa-home"></i> Data Unit
        </a>

        <a href="/admin/siteplan" class="{{ request()->is('admin/siteplan*') ? 'active' : '' }}">
            <i class="fa fa-map"></i> Siteplan Unit
        </a>

        <a href="/admin/faq" class="{{ request()->is('admin/faq*') ? 'active' : '' }}">
            <i class="fa fa-question-circle"></i> FAQ
        </a>

        <hr>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-light w-100">Logout</button>
        </form>
    </div>

    {{-- CONTENT --}}
    <div class="content">

        {{-- TOPBAR --}}
        <div class="topbar">
            <h5>@yield('title', 'Dashboard')</h5>
            <div>
                <small class="text-muted">Admin Panel Brooklyn Townhouse</small>
            </div>
        </div>

        @yield('content')
    </div>

    {{-- IMAGE PREVIEW SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.img-input').forEach(input => {
                input.addEventListener('change', function(e) {
                    const preview = document.getElementById(this.dataset.preview);
                    const file = e.target.files[0];
                    if (file && preview) {
                        preview.src = URL.createObjectURL(file);
                        preview.style.display = 'block';
                    }
                });
            });
        });
    </script>

</body>

</html>
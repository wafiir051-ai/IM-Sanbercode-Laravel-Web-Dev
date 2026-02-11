<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEODash - @yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            color: #374151;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .logo {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #f3f4f6;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            letter-spacing: -0.5px;
        }

        .nav-section {
            padding: 16px 0;
        }

        .nav-label {
            padding: 0 24px;
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            margin: 4px 16px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #6b7280;
            text-decoration: none;
        }

        .nav-item:hover {
            background-color: #f3f4f6;
            color: #374151;
        }

        .nav-item.active {
            background-color: #2563eb;
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .nav-item i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .nav-item span {
            font-size: 14px;
            font-weight: 500;
        }

       
        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }

        
        .header {
            background-color: #f9fafb;
            padding: 16px 32px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .user-menu {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            object-fit: cover;
            border: 2px solid #e5e7eb;
            transition: border-color 0.3s ease;
        }

        .user-avatar:hover {
            border-color: #3b82f6;
        }

        .dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            min-width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: background 0.2s;
            color: #374151;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .dropdown-item:first-child {
            border-radius: 12px 12px 0 0;
        }

        .dropdown-item:last-child {
            border-radius: 0 0 12px 12px;
            border-top: 1px solid #e5e7eb;
            color: #ef4444;
        }

        
        .content {
            padding: 32px;
            flex: 1;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            max-width: 1200px;
            margin-bottom: 24px;
        }

        .breadcrumb {
            font-size: 20px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .page-subtitle {
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin: 32px 0 16px 0;
        }

        
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            max-width: 400px;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
        }

        textarea.form-input {
            min-height: 120px;
            resize: vertical;
        }

       
        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        thead {
            background-color: #f9fafb;
            border-bottom: 2px solid #e5e7eb;
        }

        th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .btn-info {
            background-color: #0ea5e9;
            color: white;
        }

        .btn-info:hover {
            background-color: #0284c7;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

       
        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

    
        .action-buttons {
            display: flex;
            gap: 8px;
        }

       
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content {
                padding: 20px;
            }

            .card {
                padding: 24px;
            }
        }

        .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

@media (max-width: 768px) {
    .grid-2 {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>
    <div class="container">
       
        <aside class="sidebar">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <span class="logo-text">SEODash</span>
            </div>

            <div class="nav-section">
                <div class="nav-label">HOME</div>
                <a href="{{ route('category.index') }}" class="nav-item {{ request()->routeIs('category.index') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('category.create') }}" class="nav-item {{ request()->routeIs('category.create') ? 'active' : '' }}">
                    <i class="fas fa-edit"></i>
                    <span>Form Input</span>
                </a>
            </div>
        </aside>

       
        <main class="main-content">
          
            <header class="header">
                <div class="user-menu">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=3b82f6&color=fff" alt="User" class="user-avatar" onclick="toggleDropdown()">
                    <div class="dropdown" id="userDropdown">
                        <div class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </div>
                        <div class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </div>
                    </div>
                </div>
            </header>

          
            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" onclick="this.parentElement.style.display='none'" style="background:none; border:none; cursor:pointer; color:inherit;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        document.addEventListener('click', function(e) {
            const userMenu = document.querySelector('.user-menu');
            if (!userMenu.contains(e.target)) {
                document.getElementById('userDropdown').classList.remove('show');
            }
        });

        
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.display = 'none';
            });
        }, 5000);
    </script>
</body>
</html>
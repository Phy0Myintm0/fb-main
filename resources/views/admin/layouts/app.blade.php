<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
            transition: all 0.3s;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.2);
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .main-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" style="width: 280px;">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.hero-section.edit') }}">
                    <i class="fas fa-star"></i> Hero Section
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.hero-paragraph.edit') }}">
                    <i class="fas fa-paragraph"></i> Hero Paragraph
                </a>
            </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
        <i class="fas fa-tags"></i> Categories
    </a>
                </li>
                <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.keywords.index') }}">
        <i class="fas fa-tags"></i> Keywords
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.contents.index') }}">
        <i class="fas fa-newspaper"></i> Contents
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>User Management</span>
    </a>
</li>
                <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                        <button type="submit" class="nav-link text-start" style="background: none; border: none; width: 100%;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            @yield('content')
        </div>
    </div>
    @include('components.delete-modal')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get current URL
        const currentUrl = window.location.href;
        
        // Get all nav links
        const navLinks = document.querySelectorAll('.sidebar .nav-link');
        
        // Remove active class from all links
        navLinks.forEach(link => {
            link.classList.remove('active');
            
            // Add active class to current link
            if (link.href === currentUrl) {
                link.classList.add('active');
            }
        });
    });
</script>
    @stack('scripts')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Saved Content</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 2rem;
        }
        
        .page-header {
            background-color: white;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .content-card {
            margin-bottom: 0;
        }

        .card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 1.25rem;
        }

        .card-title {
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .card-text {
            font-size: 0.9rem;
            flex-grow: 1;
            margin-bottom: 1rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        
        .keyword-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 10px;
        }
        
        .keyword-badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
            font-weight: 500;
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 1rem;
            color: #0d6efd;
        }
        
        .back-link:hover {
            text-decoration: none;
        }
        
        .user-email {
            font-size: 0.9rem;
            color: #6c757d;
        }

        @media (max-width: 767px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }
        .no-content {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .no-content-icon {
            font-size: 3rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/" class="back-link">
            <i class="fas fa-arrow-left me-1"></i> Back to Home
        </a>
        
        <div class="page-header">
            <h1>My Saved Content</h1>
            @if(isset($email) && $email)
                <p class="user-email mb-0">Logged in as: {{ $email }}</p>
            @endif
        </div>
        
        @if(!$contents || $contents->isEmpty())
            <div class="no-content">
                <div class="no-content-icon">
                    <i class="far fa-bookmark"></i>
                </div>
                <h3>No Saved Content</h3>
                <p>You haven't saved any content yet.</p>
                <a href="/" class="btn btn-primary">Browse Content</a>
            </div>
        @else
            <div class="content-grid">
                <!-- ... (previous content card loop) ... -->
            </div>
        @endif
    </div>

    <!-- Add this script to handle potential session issues -->
    <script>
        // Check if we have an email in URL but not showing content
        const urlParams = new URLSearchParams(window.location.search);
        const emailParam = urlParams.get('email');
        
        if (emailParam && document.querySelector('.no-content')) {
            // Try to reload with session
            fetch(`/mypage/set-session?email=${encodeURIComponent(emailParam)}`)
                .then(() => window.location.href = '/mypage');
        }
        
        if (window.location.search.includes('email=') && !@json(session('user_email'))) {
        // Try to set session again
        fetch(window.location.pathname + '/set-session' + window.location.search)
            .then(() => window.location.href = '/mypage')
            .catch(() => {
                // If still failing, show the content if we have it
                document.querySelector('.no-content').style.display = 'none';
            });
    }
    </script>
</body>
</html>
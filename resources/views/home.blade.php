<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Global Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Section 1 Styles */
        .hero-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .container.mt-5 {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* Section 1 (hero section) */
.content-section {
    flex: 1;
}

/* Section 2 with sticky behavior */
.section-2 {
    position: relative;
    height: 100vh;
    overflow-y: auto;
    overscroll-behavior-y: contain;
}

/* Prevent body scroll when scrolling section 2 */
body {
    overflow-x: hidden;
}

/* Optional: Add smooth transition */
.section-2 {
    scroll-behavior: smooth;
}
        .content-section {
            padding: 3rem 0;
        }
        .main-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }
        .content-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #34495e;
        }
        
        /* Section 2 Styles */
        .section-2 {
            background-color: #f8f9fa;
            padding: 4rem 0;
        }
        .sticky-sidebar {
            position: sticky;
            top: 20px;
            height: fit-content;
        }
        .sidebar-nav {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 1rem;
        }
        
        /* Card Grid System */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .content-card {
            transition: all 0.3s ease;
            margin-bottom: 0;
            position: relative;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
            flex-shrink: 0;
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
        
        /* Search Bar Styles */
        .search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .search-box {
            position: relative;
            width: 300px;
        }
        
        .search-box input {
            padding-right: 40px;
            border-radius: 20px;
        }
        
        .search-box .btn {
            position: absolute;
            right: 5px;
            top: 5px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Category filter buttons */
        .category-filter {
            background: none;
            border: none;
            text-align: left;
            padding: 0.5rem 1rem;
            width: 100%;
            cursor: pointer;
            color: #495057;
            border-radius: 0.25rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }
        .category-filter:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .category-filter.active {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            font-weight: 500;
        }
        .category-filter .badge {
            margin-left: auto;
            transition: all 0.2s;
        }
        .category-filter:hover .badge {
            transform: scale(1.1);
        }
        
        /* Keywords styling */
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
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .card-img-top {
                height: 220px;
            }
            
            .search-box {
                width: 100%;
            }
        }
        /* Content Modal Styles */
/* Add these to your existing styles */
.content-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    backdrop-filter: blur(2px); /* Optional: adds blur effect to background */    
    display: none;
    z-index: 1050;
    overflow-y: auto;
    padding: 2rem 1rem;
}

.modal-container {
    width: 50%;
    max-width: 1400px;
    margin: 2rem auto;
    background: white;
    padding: 2rem;
    border-radius: 12px;
    position: relative;
    animation: modalFadeIn 0.3s ease;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
}

.modal-image-container {
    cursor: pointer;
    height: auto;
    max-height: 70vh;
    overflow: hidden;
    margin-bottom: 2rem;
    border-radius: 12px;
}

.modal-image-container img {
    pointer-events: none;
    width: 100%;
    height: auto;
    max-height: 70vh;
    object-fit: cover;
    border-radius: 12px;
    margin-left: auto;
    margin-right: auto;
    display: block;
}

/* Additional images scrolling */
.additional-images-scroll {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    gap: 15px;
    padding-top: 15px;
    padding-bottom: 10px;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    -ms-overflow-style: none;  /* IE 10+ */
    scrollbar-width: none;     /* Firefox */
}

.additional-images-scroll::-webkit-scrollbar {
    display: none;
}

.additional-images-scroll img.additional-image {
    flex: 0 0 auto !important;
    width: 40% !important;
    max-width: 250px !important;
    height: auto !important;
    max-height: 180px !important;
    object-fit: cover !important;
    border-radius: 10px !important;
    scroll-snap-align: start !important;
    transition: transform 0.2s ease !important;
    cursor: pointer !important;
}



.additional-images-scroll img.additional-image:hover {
    transform: scale(1.03);
}

/* Modal Header Styles */
.modal-header {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 0.5rem 1rem;
  border-bottom: 1px solid #dee2e6;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
  background-color: #f8f9fa;
}

/* Adjust close button positioning */
.modal-header .close-modal {
  position: static; /* Remove absolute positioning */
  font-size: 1.5rem;
  padding: 0.25rem 0.5rem;
  margin: 0;
  color: #6c757d;
}

.modal-header .close-modal:hover {
  background-color: transparent;
  color: #495057;
}

/* Modal Body Styles */
.modal-body {
  padding: 1.5rem;
}

/* Adjust modal container to account for new header */
.modal-container {
  /* Your existing styles */
  padding: 0; /* Remove padding since header/body have their own */
}

/* Adjust image container margin */
.modal-image-container {
  margin-bottom: 1.5rem;
  
}.close-modal {
    position: absolute;
    top: 0.5rem;
    right: 1rem;
    font-size: 2.5rem;
    background: transparent;
    border: none;
    cursor: pointer;
    color: #999;
    padding: 0.5rem;
    transition: all 0.3s ease;
}

.close-modal:hover {
    background-color: #ddd;
    color: #333;
}

/* Responsive */
@media (max-width: 992px) {
    .modal-container {
        width: 98%;
        padding: 1.5rem;
    }

    .modal-image-container {
        max-height: 60vh;
    }

    .additional-images-scroll img.additional-image {
        flex: 0 0 45%;
        max-width: 45%;
    }
}

@media (max-width: 576px) {
    .modal-image-container {
        max-height: 40vh;
    }

    .modal-content {
        padding: 0;
    }

    .close-modal {
        font-size: 2rem;
        padding: 0.3rem;
    }

    .additional-images-scroll img.additional-image {
        flex: 0 0 70%;
        max-width: 70%;
    }
}

    </style>
</head>
<body>
    <!-- Section 1: Hero Image and Text -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('img/world-map.png') }}" alt="World Map" class="hero-image">
            </div>
        </div>
        
        <div class="row content-section">
    <div class="col-lg-8 mx-auto text-center">
        <h1 class="main-title">{{ $hero?->title ?? 'Default Main Title' }}</h1>
        <p class="content-text">
            {{ $hero?->content ?? 'Default paragraph content about the platform goes here. You can manage this from the admin dashboard.' }}
        </p>

        <a href="#" class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#heroModal">
            Learn More
        </a>    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="heroModal" tabindex="-1" aria-labelledby="heroModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>{{ $heroParagraph?->paragraph }}</p>
      </div>
    </div>
  </div>
</div>

    
    <!-- Section 2: Content with Sidebar -->
    <div class="section-2">
        <div class="container">
            <div class="row">
                <!-- Sticky Sidebar (40%) -->
                <div class="col-lg-4">
                    <div class="sticky-sidebar">
                        <div class="sidebar-nav">
                            <h3 class="sidebar-title">Categories</h3>
                            <nav class="nav flex-column">
                                <button type="button" class="nav-link category-filter active" data-category-id="new">
                                    New
                                </button>
                                @foreach($categories as $category)
                                <button type="button" class="nav-link category-filter" data-category-id="category-{{ $category->id }}">
                                    {{ $category->name }}
                                    
                                </button>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>
                
                <!-- Content Area (60%) with 2 cards per row -->
                <div class="col-lg-8">
                    <div class="search-header">
                            <h2 class="mb-0" id="category-title">
                                Latest Content
                                <span class="badge bg-secondary" id="category-count">
                                    ({{ $contents->count() }})
                                </span>
                            </h2>

                        <div class="search-box">
                            <input type="text" id="content-search" class="form-control" placeholder="Search content...">
                            <button class="btn btn-primary" id="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="content-grid" id="content-container">
                @foreach($contents->sortByDesc('publish_date') as $content)                        
<div class="content-card" 
                             id="content-{{ $content->id }}"
                             data-slug="{{ $content->slug }}"
                             data-category-id="category-{{ $content->category_id }}"
                             data-publish-date="{{ $content->publish_date }}"
                             data-title="{{ strtolower($content->title) }}"
                             data-description="{{ strtolower($content->description_preview) }}"
                             data-keywords="{{ strtolower($content->keywords->pluck('name')->implode(',')) }}">
                            <div class="card h-100">
                                <img src="/storage/content-images/{{ basename($content->image) }}" class="card-img-top" alt="{{ $content->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $content->title }}</h5>
                                    <p class="card-text">{{ $content->description_preview }}</p>
                                    
                                    @if($content->keywords->count())
                                    <div class="mt-auto">
                                        <div class="keyword-container">
                                            @foreach($content->keywords as $keyword)
                                            <span class="badge keyword-badge bg-{{ $keyword->color }}">
                                                {{ $keyword->name }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <span class="publish-date">
                                            <i class="far fa-calendar-alt me-1"></i> 
                                            {{ $content->formatted_publish_date }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="contentModal" class="content-modal">
  <div class="modal-container">
    <!-- Modal Header with close button -->
    <div class="modal-header">
      <button class="close-modal">&times;</button>
    </div>

    <!-- Modal Body Content -->
    <div class="modal-body">
      <div class="modal-image-container">
        <img id="modalContentImage" src="" alt="Content Image" style="width: 100%; max-height: 300px; object-fit: cover;">
      </div>

      <div class="modal-content">
        <h2 id="modalContentTitle"></h2>
        <div class="meta-info">
          <span id="modalContentKeywords"></span>
          <i class="fas fa-calendar-alt"></i> <span id="modalContentDate"></span>
        </div>
        <div id="modalContentDescription" class="description"></div>
      </div>
      <div id="modalAdditionalImages" class="additional-images-scroll"></div>
    </div>
  </div>
</div>

    <!-- JavaScript -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const section2 = document.querySelector('.section-2');
    let isScrollingDown = false;
    let lastScrollTop = 0;
    let isSnapped = false;

    window.addEventListener('scroll', function() {
        const st = window.pageYOffset || document.documentElement.scrollTop;
        
        // Detect scroll direction
        isScrollingDown = st > lastScrollTop;
        lastScrollTop = st <= 0 ? 0 : st;

        // Get section 2 position
        const section2Top = section2.offsetTop;
        const currentPos = window.scrollY;

        // When scrolling down and reaching section 2
        if (isScrollingDown && !isSnapped && currentPos >= section2Top - window.innerHeight/2) {
            window.scrollTo({
                top: section2Top,
                behavior: 'smooth'
            });
            isSnapped = true;
        }
        
        // Reset snapped state when scrolling up past section 2
        if (!isScrollingDown && currentPos < section2Top - window.innerHeight/2) {
            isSnapped = false;
        }
    });

    // Remove wheel event prevention for upward scrolling
    section2.addEventListener('wheel', function(e) {
        // Only prevent default if scrolling down at top of section
        if (isScrollingDown && this.scrollTop === 0 && e.deltaY < 0) {
            e.preventDefault();
        }
        // Always allow scrolling up
        if (e.deltaY > 0) {
            return;
        }
    }, { passive: false });
});
    document.addEventListener('DOMContentLoaded', function() {

        // Add this to your existing DOMContentLoaded event listener
// Attach click handlers to content cards
document.querySelectorAll('.content-card').forEach(card => {
    card.addEventListener('click', function () {
        const slug = this.getAttribute('data-slug');
        loadContentBySlug(slug);
    });
});

function loadContentBySlug(slug) {
    fetch(`/api/content/${slug}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (!data.success) {
                throw new Error('API request was not successful');
            }

            const content = data.content;

            // Validate required elements
            const requiredElements = [
                'modalContentImage',
                'modalContentTitle',
                'modalContentDescription',
                'modalContentDate',
                'modalContentKeywords',
                'contentModal',
                'modalAdditionalImages'
            ];
            for (const id of requiredElements) {
                if (!document.getElementById(id)) {
                    throw new Error(`Required element ${id} not found`);
                }
            }

            // Set main image
            const imagePath = content.image?.startsWith('content-images/')
                ? `/storage/${content.image}`
                : `/storage/content-images/${content.image?.split('/').pop()}`;
            document.getElementById('modalContentImage').src = imagePath;

            // Set title and description
            document.getElementById('modalContentTitle').textContent = content.title ?? 'No Title';
            document.getElementById('modalContentDescription').innerHTML = (content.description ?? '').replace(/\n/g, '<br>');

            // Set publish date
            const publishDateEl = document.getElementById('modalContentDate');
            if (content.publish_date) {
                const publishDate = new Date(content.publish_date);
                publishDateEl.textContent = publishDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });
            } else {
                publishDateEl.textContent = 'Date not available';
            }

            // Set keywords
            const keywordsElement = document.getElementById('modalContentKeywords');
            keywordsElement.innerHTML = '';
            if (Array.isArray(content.keywords)) {
                content.keywords.forEach(keyword => {
                    const span = document.createElement('span');
                    span.className = `badge bg-${keyword.color || 'primary'} me-1 mb-1`;
                    span.textContent = keyword.name;
                    keywordsElement.appendChild(span);
                });
            }

            // Display additional images
          // Additional images (horizontal scroll)
const additionalImagesContainer = document.getElementById('modalAdditionalImages');
additionalImagesContainer.innerHTML = '';

const additionalImageFields = [content.image_1, content.image_2, content.image_3].filter(Boolean);
const modalContentImage = document.getElementById('modalContentImage');

// Store original image source
const originalImageSrc = modalContentImage.src;

if (additionalImageFields.length > 0) {
    additionalImagesContainer.style.display = 'flex';

    additionalImageFields.forEach(imgPath => {
        const fullImgPath = imgPath.startsWith('content-images/')
            ? `/storage/${imgPath}`
            : `/storage/content-images/${imgPath.split('/').pop()}`;

        const img = document.createElement('img');
        img.src = fullImgPath;
        img.alt = content.title + ' additional image';
        img.classList.add('additional-image');

        img.addEventListener('click', (e) => {
            e.stopPropagation();
            modalContentImage.src = fullImgPath;
        });

        additionalImagesContainer.appendChild(img);
    });

    // Add click handler to reset to original image
    document.querySelector('.modal-image-container').addEventListener('click', (e) => {
        if (e.target === document.querySelector('.modal-image-container')) {
            modalContentImage.src = originalImageSrc;
        }
    });
} else {
    additionalImagesContainer.style.display = 'none';
}

            console.log('API data:', data);


            // Show modal
            document.getElementById('contentModal').style.display = 'block';
            document.body.classList.add('modal-open');
        })
        .catch(error => {
            alert(`Failed to load content: ${error.message}`);

            const errorElement = document.getElementById('contentLoadError');
            if (errorElement) {
                errorElement.textContent = `Failed to load content: ${error.message}`;
                errorElement.style.display = 'block';
            }
        });

}



// Close modal handler
document.querySelector('.close-modal').addEventListener('click', function() {
    document.getElementById('contentModal').style.display = 'none';
    document.body.style.overflow = 'auto'; // Re-enable scrolling
});

// Close when clicking outside content
document.getElementById('contentModal').addEventListener('click', function(e) {
    if (e.target === this) {
        this.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});
    // DOM Elements
    const categoryFilters = document.querySelectorAll('.category-filter');
    const allCards = Array.from(document.querySelectorAll('.content-card'));
    const searchInput = document.getElementById('content-search');
    const searchBtn = document.getElementById('search-btn');
    
    // Store original order (newest first)
    const originalOrder = [...allCards].sort((a, b) => {
        return new Date(b.dataset.publishDate) - new Date(a.dataset.publishDate);
    });
    
    // Initialize with New category showing first 6 items
    filterByCategory('new');
    
    // Category filter function
    function filterByCategory(selectedCategoryId) {
    const titleElement = document.getElementById('category-title');
    const countElement = document.getElementById('category-count');

    let count = 0;

    // Hide all cards first
    allCards.forEach(card => card.style.display = 'none');

    if (selectedCategoryId === 'new') {
        // Show first 6 newest cards
        const newCards = originalOrder.slice(0, 6);
        newCards.forEach(card => {
            card.style.display = 'block';
        });

        // Set title and count
        titleElement.innerHTML = `Latest Content <span class="badge bg-secondary" id="category-count">(${newCards.length})</span>`;
    } else {
        // Show cards matching the selected category
        allCards.forEach(card => {
            if (card.dataset.categoryId === selectedCategoryId) {
                card.style.display = 'block';
                count++;
            }
        });

        // Get readable name from the button
        const categoryBtn = document.querySelector(`.category-filter[data-category-id="${selectedCategoryId}"]`);
        const categoryName = categoryBtn ? categoryBtn.textContent.trim().split('\n')[0] : 'Category';

        // Set title and count
        titleElement.innerHTML = `${categoryName} <span class="badge bg-secondary" id="category-count">(${count})</span>`;
    }
}

    
    // Search function
    function searchContents() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        if (searchTerm === '') {
            // If search is empty, return to current category filter
            const activeFilter = document.querySelector('.category-filter.active');
            filterByCategory(activeFilter.dataset.categoryId);
            return;
        }
        
        // Search through all cards
        allCards.forEach(card => {
            const title = card.dataset.title;
            const description = card.dataset.description;
            const keywords = card.dataset.keywords;
            
            if (title.includes(searchTerm) || 
                description.includes(searchTerm) || 
                keywords.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    // Event Listeners
    
    // Category filter event listeners
    categoryFilters.forEach(button => {
        button.addEventListener('click', function() {
            // Update active state
            categoryFilters.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Clear search input
            searchInput.value = '';
            
            // Filter by category
            filterByCategory(this.dataset.categoryId);
        });
    });
    
    // Search event listeners
    searchBtn.addEventListener('click', searchContents);
    searchInput.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            searchContents();
        }
    });
});
    </script>
    
    <!-- Add CSRF Token Meta Tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
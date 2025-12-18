@extends('layout.master')

@section('css')
<style>
  :root {
    --primary-color: #dcbb87;
    --secondary-color: #2c3e50;
    --dark-bg: #1a252f;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Gallery Section */
  .gallery-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
  }

  .section-label {
    color: var(--primary-color);
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 15px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
  }

  .section-label::before,
  .section-label::after {
    content: '';
    width: 40px;
    height: 2px;
    background: var(--primary-color);
  }

  .section-title {
    color: var(--secondary-color);
    font-size: 3rem;
    font-weight: 800;
    text-align: center;
    margin-bottom: 20px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
  }

  .section-description {
    text-align: center;
    color: #6c757d;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto 60px;
    line-height: 1.8;
  }

  /* Masonry Grid */
  .masonry-grid {
    column-count: 4;
    column-gap: 20px;
  }

  @media (max-width: 1200px) {
    .masonry-grid {
      column-count: 3;
    }
  }

  @media (max-width: 768px) {
    .masonry-grid {
      column-count: 2;
    }
  }

  @media (max-width: 576px) {
    .masonry-grid {
      column-count: 1;
    }
  }

  .gallery-item {
    break-inside: avoid;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    cursor: pointer;
    background: white;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
  }

  .gallery-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
  }

  .gallery-item img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.5s ease;
  }

  .gallery-item:hover img {
    transform: scale(1.1);
  }

  .gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(220, 187, 135, 0.95), rgba(201, 168, 104, 0.95));
    opacity: 0;
    transition: opacity 0.4s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 20px;
  }

  .gallery-item:hover .gallery-overlay {
    opacity: 1;
  }

  .gallery-category {
    background: white;
    color: var(--secondary-color);
    padding: 6px 20px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .gallery-title {
    color: white;
    font-size: 1.3rem;
    font-weight: 700;
    text-align: center;
    margin: 0;
  }

  .zoom-icon {
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 1.5rem;
    transition: all 0.3s ease;
    margin-top: 10px;
  }

  .zoom-icon:hover {
    transform: scale(1.1) rotate(90deg);
    box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
  }

  /* Image Popup */
  .image-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  .popup-content {
    position: relative;
    max-width: 90%;
    max-height: 85vh;
    animation: zoomIn 0.4s ease;
  }

  @keyframes zoomIn {
    from {
      transform: scale(0.8);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }

  .popup-content img {
    max-width: 100%;
    max-height: 85vh;
    border-radius: 10px;
    /* box-shadow: 0 0 50px rgba(220, 187, 135, 0.5); */
  }

  .close-popup {
    position: absolute;
    top: -60px;
    right: 0;
    font-size: 40px;
    color: #fff;
    cursor: pointer;
    background: rgba(220, 187, 135, 0.3);
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-weight: 300;
  }

  .close-popup:hover {
    background: var(--primary-color);
    transform: rotate(90deg);
  }

  .popup-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(220, 187, 135, 0.3);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.5rem;
  }

  .popup-nav:hover {
    background: var(--primary-color);
  }

  .popup-nav.prev {
    left: -70px;
  }

  .popup-nav.next {
    right: -70px;
  }

  /* Gallery Stats */
  .gallery-stats {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-top: 80px;
    flex-wrap: wrap;
  }

  .stat-item {
    text-align: center;
  }

  .stat-number {
    font-size: 3rem;
    font-weight: 800;
    color: var(--primary-color);
    display: block;
    margin-bottom: 10px;
  }

  .stat-label {
    color: #6c757d;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .section-title {
      font-size: 2rem;
    }

    .popup-nav {
      display: none;
    }

    .close-popup {
      top: 20px;
      right: 20px;
    }
  }
</style>
@endsection

@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="banner-section inner-banner-section bg-overlay-black bg_img"
    data-background="{{asset('assets/images/aviation/home_page/bgimg/inner-bg.png')}}">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-12 text-center">
                <div class="banner-content">
                    <h1 class="title">Our Gallery</h1>
                    <div class="breadcrumb-area">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section Start -->
<section class="gallery-section">
  <div class="container-fluid">
    <div class="section-label">OUR GALLERY</div>
    <h2 class="section-title">Capturing Aviation Excellence</h2>
    <p class="section-description">
      Explore our collection of memorable moments, showcasing our state-of-the-art facilities, aircraft fleet, and the exciting journey of our students.
    </p>
  
    <!-- Masonry Gallery Grid -->
      <div class="masonry-grid">
        @forelse($galleries as $gallery)
          <div class="gallery-item" data-category="training">
            <img src="{{ asset($gallery->images) }}" alt="Aviation Training">
            <div class="gallery-overlay">
              <span class="gallery-category">Training</span>
              <h3 class="gallery-title">Flight Training Session</h3>
              <div class="zoom-icon">
                <i class="fas fa-search-plus"></i>
              </div>
            </div>
          </div>
          @empty
            <p class="text-center">No gallery images available.</p>
        @endforelse
      </div>
  </div>
</section>

<!-- Image Popup -->
<div id="imagePopup" class="image-popup">
  <div class="popup-content">
    <span class="close-popup">&times;</span>
    <div class="popup-nav prev"><i class="fas fa-chevron-left"></i></div>
    <img src="" alt="Popup Image">
    <div class="popup-nav next"><i class="fas fa-chevron-right"></i></div>
  </div>
</div>

@endsection

@section('js')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const popup = document.getElementById('imagePopup');
    const popupImage = popup.querySelector('img');
    const closeBtn = popup.querySelector('.close-popup');
    const prevBtn = popup.querySelector('.prev');
    const nextBtn = popup.querySelector('.next');
    let currentImageIndex = 0;
    let visibleImages = [];

    // Filter functionality
    filterBtns.forEach(btn => {
      btn.addEventListener('click', function () {
        const filter = this.getAttribute('data-filter');
        
        // Update active button
        filterBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        // Filter items
        galleryItems.forEach(item => {
          if (filter === 'all' || item.getAttribute('data-category') === filter) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });

        updateVisibleImages();
      });
    });

    // Update visible images array
    function updateVisibleImages() {
      visibleImages = Array.from(galleryItems).filter(item => 
        item.style.display !== 'none'
      );
    }

    updateVisibleImages();

    // Open popup on image click
    galleryItems.forEach((item, index) => {
      item.addEventListener('click', function () {
        const img = this.querySelector('img');
        currentImageIndex = visibleImages.indexOf(item);
        popupImage.src = img.src;
        popup.style.display = 'flex';
      });
    });

    // Close popup
    closeBtn.addEventListener('click', function () {
      popup.style.display = 'none';
    });

    popup.addEventListener('click', function (e) {
      if (e.target === popup) {
        popup.style.display = 'none';
      }
    });

    // Navigation
    prevBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      currentImageIndex = (currentImageIndex - 1 + visibleImages.length) % visibleImages.length;
      popupImage.src = visibleImages[currentImageIndex].querySelector('img').src;
    });

    nextBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      currentImageIndex = (currentImageIndex + 1) % visibleImages.length;
      popupImage.src = visibleImages[currentImageIndex].querySelector('img').src;
    });

    // Keyboard navigation
    document.addEventListener('keydown', function (e) {
      if (popup.style.display === 'flex') {
        if (e.key === 'Escape') {
          popup.style.display = 'none';
        } else if (e.key === 'ArrowLeft') {
          prevBtn.click();
        } else if (e.key === 'ArrowRight') {
          nextBtn.click();
        }
      }
    });
  });
</script>
@endsection
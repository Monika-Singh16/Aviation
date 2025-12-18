@extends('layout.master')

@section('css')
<style>
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes float {
    0%, 100% {
      transform: translateY(0px);
    }
    50% {
      transform: translateY(-10px);
    }
  }


  .facility-section {
    padding: 100px 0;
    background: #fff;
    position: relative;
    overflow: hidden;
  }

  .facility-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100px;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(211,168,79,0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: float 8s ease-in-out infinite;
  }

  .facility-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: -100px;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(211,168,79,0.08) 0%, transparent 70%);
    border-radius: 50%;
    animation: float 10s ease-in-out infinite reverse;
  }

  .section-label {
    color: #d3a84f;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 15px;
    animation: fadeInUp 0.8s ease-out;
    position: relative;
  }

  .section-label::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: #d3a84f;
    margin: 10px auto 0;
    border-radius: 2px;
  }

  .section-title {
    font-size: 48px;
    font-weight: 700;
    color: #1a1a1a;
    text-align: center;
    margin-bottom: 20px;
    animation: fadeInUp 1s ease-out;
  }

  .section-description {
    color: #666;
    font-size: 17px;
    text-align: center;
    max-width: 700px;
    margin: 0 auto 80px;
    line-height: 1.8;
    animation: fadeInUp 1.2s ease-out;
  }

  .facility-card {
    position: relative;
    background: #fff;
    border: 2px solid #f0f0f0;
    border-radius: 15px;
    padding: 45px 35px;
    text-align: center;
    margin-bottom: 30px;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    height: 100%;
    overflow: hidden;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
  }

  .facility-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(211,168,79,0.95) 0%, rgba(180,140,50,0.95) 100%), 
                url('https://images.unsplash.com/photo-1540962351504-03099e0a754b?w=800') center/cover;
    opacity: 0;
    transition: opacity 0.5s ease;
    z-index: 1;
  }

  .facility-card:hover::before {
    opacity: 1;
  }

  .facility-card > * {
    position: relative;
    z-index: 2;
  }

  .facility-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(211,168,79,0.4);
    border-color: #d3a84f;
  }

  .facility-icon {
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg, rgba(211,168,79,0.15) 0%, rgba(211,168,79,0.05) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    border: 2px solid rgba(211,168,79,0.2);
  }

  .facility-card:hover .facility-icon {
    background: #fff;
    transform: scale(1.15) rotate(360deg);
    border-color: #fff;
    box-shadow: 0 10px 30px rgba(255,255,255,0.3);
  }

  .facility-icon i {
    font-size: 42px;
    color: #d3a84f;
    transition: color 0.4s ease;
  }

  .facility-card:hover .facility-icon i {
    color: #d3a84f;
  }

  .facility-title {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 18px;
    transition: color 0.4s ease;
  }

  .facility-card:hover .facility-title {
    color: #fff;
  }

  .facility-text {
    color: #666;
    font-size: 15px;
    line-height: 1.8;
    margin: 0;
    transition: color 0.4s ease;
  }

  .facility-card:hover .facility-text {
    color: rgba(255,255,255,0.95);
  }

  .feature-box {
    position: relative;
    background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
    border-left: 5px solid #d3a84f;
    padding: 45px 40px;
    border-radius: 12px;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    -webkit-box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
  }

  .feature-box::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(211,168,79,0.1) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.5s ease;
  }

  .feature-box:hover::before {
    opacity: 1;
  }

  .feature-box:hover {
    transform: translateX(10px) scale(1.03);
    -webkit-box-shadow: 0 15px 50px rgba(211,168,79,0.2);
    box-shadow: 0 15px 50px rgba(211,168,79,0.2);
    border-left-width: 8px;
  }

  .feature-title {
    font-size: 30px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 15px;
  }

  .feature-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: #d3a84f;
    border-radius: 2px;
    transition: width 0.4s ease;
  }

  .feature-box:hover .feature-title::after {
    width: 100px;
  }

  .feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .feature-list li {
    color: #555;
    font-size: 16px;
    padding: 16px 0 16px 40px;
    border-bottom: 1px solid rgba(211,168,79,0.15);
    transition: all 0.4s ease;
    position: relative;
  }

  .feature-list li:last-child {
    border-bottom: none;
  }

  .feature-list li::before {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    color: #d3a84f;
    font-size: 18px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .feature-list li:hover {
    color: #d3a84f;
    padding-left: 50px;
    font-weight: 500;
  }

  .feature-list li:hover::before {
    transform: scale(1.3) rotate(360deg);
  }

  .row > [class*='col-'] {
    animation: fadeInUp 0.8s ease-out backwards;
  }

  .row > [class*='col-']:nth-child(1) { animation-delay: 0.1s; }
  .row > [class*='col-']:nth-child(2) { animation-delay: 0.2s; }
  .row > [class*='col-']:nth-child(3) { animation-delay: 0.3s; }
  .row > [class*='col-']:nth-child(4) { animation-delay: 0.4s; }
  .row > [class*='col-']:nth-child(5) { animation-delay: 0.5s; }
  .row > [class*='col-']:nth-child(6) { animation-delay: 0.6s; }

  @media (max-width: 768px) {
    .banner-title {
      font-size: 36px;
    }
    
    .section-title {
      font-size: 32px;
    }
    
    .facility-card {
      padding: 35px 25px;
    }
    
    .feature-box {
      padding: 35px 25px;
      margin-bottom: 30px;
    }
  }
</style>
@endsection

@section('content')
<!-- Banner Section -->
 
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Banner
      ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <section class="banner-section inner-banner-section bg-overlay-black bg_img"
            data-background="{{asset('assets/images/aviation/home_page/bgimg/inner-bg.png')}}">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 text-center">
                        <div class="banner-content">
                            <h1 class="title">Our Facility</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}l">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Facility</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </section> 
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <!-- Facility Section -->
  <section class="facility-section">
    <div class="container">
      <div class="section-label">OUR FACILITIES</div>
      <h2 class="section-title">Premium Aviation Training</h2>
      <p class="section-description">
        Experience world-class aviation training with our state-of-the-art facilities designed to shape the future of aviation professionals
      </p>
      
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="facility-card">
            <div class="facility-icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <h3 class="facility-title">Expert Training</h3>
            <p class="facility-text">Learn from experienced aviation professionals with decades of industry expertise and hands-on knowledge</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="facility-card">
            <div class="facility-icon">
              <i class="fas fa-laptop-code"></i>
            </div>
            <h3 class="facility-title">Modern Simulators</h3>
            <p class="facility-text">Train on cutting-edge flight simulators that replicate real-world scenarios with precision and accuracy</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="facility-card">
            <div class="facility-icon">
              <i class="fas fa-book-open"></i>
            </div>
            <h3 class="facility-title">Comprehensive Library</h3>
            <p class="facility-text">Access extensive aviation resources, technical manuals, and digital learning materials for enhanced study</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="facility-card">
            <div class="facility-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="facility-title">Safety Standards</h3>
            <p class="facility-text">Training programs aligned with international aviation safety protocols and regulatory requirements</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6mb-4">
          <div class="facility-card">
            <div class="facility-icon">
              <i class="fas fa-users"></i>
            </div>
            <h3 class="facility-title">Small Class Sizes</h3>
            <p class="facility-text">Personalized attention with limited batch sizes ensuring quality education and individual mentorship</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="facility-card">
            <div class="facility-icon">
              <i class="fas fa-certificate"></i>
            </div>
            <h3 class="facility-title">Certified Programs</h3>
            <p class="facility-text">Industry-recognized certifications that open doors to prestigious career opportunities worldwide</p>
          </div>
        </div>
      </div>
      
      <div class="row mt-5">
        <div class="col-lg-6">
          <div class="feature-box">
            <h3 class="feature-title">Training Infrastructure</h3>
            <ul class="feature-list">
              <li>Advanced flight simulation laboratories</li>
              <li>Climate-controlled training classrooms</li>
              <li>Practical workshop facilities</li>
              <li>High-tech audio-visual equipment</li>
              <li>Aviation maintenance training hangar</li>
              <li>Computer labs with latest software</li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="feature-box">
            <h3 class="feature-title">Student Services</h3>
            <ul class="feature-list">
              <li>Career counseling and placement support</li>
              <li>Hostel accommodation facilities</li>
              <li>Transportation services available</li>
              <li>24/7 library and study rooms access</li>
              <li>Medical and health services</li>
              <li>Sports and recreational facilities</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@extends('layout.master')
@section('css')
<style>
   :root {
            --primary-color: #dcbb87;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* Hero Advantages Section */
        .advantages-hero {
            padding: 60px 0;
            background: #fff;
            position: relative;
            overflow: hidden;
        }

        .advantages-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(220, 187, 135, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(220, 187, 135, 0.15) 0%, transparent 50%);
        }

        .hero-content-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }

        .hero-main-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .hero-main-title span {
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto 50px;
            line-height: 1.8;
            color: #353333;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            flex-wrap: wrap;
        }

        .hero-stat-item {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block; 
            width: auto;          
            line-height: 1;       
            letter-spacing: -1px;  
        }

        .hero-stat-label {
            font-size: 1.1rem;
            font-weight: 500;
            color: #6d6d6d;
            text-transform: uppercase;
            letter-spacing: 0.5px; 
            margin-top: 5px;
            display: block;
        }

        /* Why Choose VAA Section */
        .why-choose-section {
            padding: 60px 0;
            background: #19232d;
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-subtitle {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .advantage-card {
            background: white;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.4s;
            height: 100%;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .advantage-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), #c9a868);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .advantage-card:hover::before {
            transform: scaleX(1);
        }

        .advantage-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }

        .advantage-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(220, 187, 135, 0.3);
            transition: all 0.3s;
        }

        .advantage-card:hover .advantage-icon {
            transform: rotateY(360deg);
        }

        .advantage-card h4 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .advantage-card p {
            color: #6c757d;
            line-height: 1.8;
            margin: 0;
        }

        /* Facilities Section */
        .facilities-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .facility-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.4s;
            height: 100%;
        }

        .facility-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .facility-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .facility-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .facility-card:hover .facility-image img {
            transform: scale(1.1);
        }

        .facility-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(220, 187, 135, 0.9), rgba(201, 168, 104, 0.9));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s;
        }

        .facility-card:hover .facility-overlay {
            opacity: 1;
        }

        .facility-icon-overlay {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 2.5rem;
        }

        .facility-content {
            padding: 20px;
        }

        .facility-content h4 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .facility-content p {
            color: #6c757d;
            line-height: 1.8;
            margin-bottom: 0px;
        }

        .facility-features {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .facility-features li {
            padding: 5px 0;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .facility-features li i {
            color: var(--primary-color);
            font-size: 0.9rem;
        }

        /* Success Stories Section */
        .success-section {
            padding: 60px 0;
            background: #19232d;
            position: relative;
        }

        .success-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .success-stat-card {
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .success-stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .success-stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(220, 187, 135, 0.4);
        }

        .success-stat-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .success-stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 10px;
            display: block;
        }

        .success-stat-text {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Training Excellence Section */
        .training-excellence-section {
            padding: 60px 0;
            background: #fff;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .training-excellence-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(220,187,135,0.05)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
        }

        .training-content {
            position: relative;
            z-index: 2;
        }

        .training-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 21px 18px;
            border: 2px solid rgba(220, 187, 135, 0.2);
            transition: all 0.3s;
            height: 100%;
        }

        .training-card:hover {
            background: rgba(255,255,255,0.08);
            border-color: var(--primary-color);
            transform: translateY(-10px);
        }

        .training-card-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 25px;
        }

        .training-card h5 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #000;
        }

        .training-card p {
            opacity: 0.9;
            line-height: 1.8;
            margin: 0;
            color: #3d3c3c;
        }

        /* Comparison Section */
        .comparison-section {
            padding: 60px 0;
            background: #19232d;
        }

        .comparison-table-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .comparison-table {
            width: 100%;
            margin: 0;
        }

        .comparison-table thead {
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            color: white;
        }

        .comparison-table thead th {
            padding: 25px 20px;
            font-weight: 700;
            font-size: 1.1rem;
            text-align: center;
            border: none;
        }

        .comparison-table tbody tr {
            transition: all 0.3s;
        }

        .comparison-table tbody tr:hover {
            background: #f8f9fa;
        }

        .comparison-table tbody td {
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
            text-align: center;
        }

        .comparison-table tbody td:first-child {
            font-weight: 600;
            color: var(--secondary-color);
            text-align: left;
        }

        .check-icon {
            color: #28a745;
            font-size: 1.5rem;
        }

        .cross-icon {
            color: #dc3545;
            font-size: 1.5rem;
        }

        /* CTA Section */
        .cta-vaa-section {
            padding: 60px 0;
            background: #fff;
            position: relative;
            overflow: hidden;
        }

        .cta-vaa-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .cta-vaa-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary-color), #c9a868);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin: 0 auto 35px;
            box-shadow: 0 20px 40px rgba(220, 187, 135, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .cta-vaa-content h2 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .cta-vaa-content p {
            font-size: 1.3rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto 40px;
            line-height: 1.8;
            color: #373434;
        }

        .btn-join-now {
            background: var(--primary-color);
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 1.2rem;
            letter-spacing: 2px;
            transition: all 0.3s;
            border: 3px solid var(--primary-color);
            display: inline-block;
            text-decoration: none;
            box-shadow: 0 15px 35px rgba(220, 187, 135, 0.4);
        }

        .btn-join-now:hover {
            background: transparent;
            color: var(--primary-color);
            transform: scale(1.05);
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-main-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }

            .hero-stats {
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .hero-main-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .hero-stat-number {
                font-size: 2.5rem;
            }

            .cta-vaa-content h2 {
                font-size: 2.2rem;
            }

            .comparison-table {
                font-size: 0.85rem;
            }

            .comparison-table thead th,
            .comparison-table tbody td {
                padding: 15px 10px;
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
                            <h1 class="title">Advantages</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Advantages</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
   <section class="advantages-hero">
        <div class="container">
            <div class="hero-content-wrapper">
                <span class="hero-badge">
                    <i class="fas fa-star mr-2"></i>Why Choose VAA
                </span>
                <h1 class="hero-main-title">
                    The <span>VAA Advantage</span><br>Excellence in Aviation Training
                </h1>
                <p class="hero-description">
                    Vihanga Aviation Academy stands out as a premier institution for pilot training with unmatched facilities, experienced faculty, and a proven track record of producing successful aviation professionals.
                </p>
                <div class="hero-stats">
                    <div class="hero-stat-item">
                        <span class="hero-stat-number">500+</span>
                        <span class="hero-stat-label">Pilots Trained</span>
                    </div>
                    <div class="hero-stat-item">
                        <span class="hero-stat-number">95%</span>
                        <span class="hero-stat-label">Success Rate</span>
                    </div>
                    <div class="hero-stat-item">
                        <span class="hero-stat-number">20+</span>
                        <span class="hero-stat-label">Modern Aircraft</span>
                    </div>
                    <div class="hero-stat-item">
                        <span class="hero-stat-number">15+</span>
                        <span class="hero-stat-label">Years Experience</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose VAA Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Our Strengths</div>
                <h2 class="section-title text-white">Why Choose Vihanga Aviation Academy</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4>DGCA Approved</h4>
                        <p>Fully approved by DGCA (Directorate General of Civil Aviation) ensuring industry-recognized certifications and compliance with international aviation standards.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h4>Expert Instructors</h4>
                        <p>Learn from highly experienced instructors with thousands of flying hours and extensive knowledge in aviation training and commercial operations.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h4>Modern Fleet</h4>
                        <p>Train on well-maintained modern aircraft equipped with latest avionics and safety systems to prepare you for real-world aviation challenges.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>International Standards</h4>
                        <p>Training curriculum aligned with international aviation standards making our graduates eligible for global aviation opportunities and careers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h4>Job Placement Support</h4>
                        <p>Strong industry connections and dedicated placement cell to help you secure positions with leading airlines and aviation companies worldwide.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h4>Affordable Fees</h4>
                        <p>Competitive fee structure with flexible payment options and scholarship opportunities making quality aviation training accessible to aspiring pilots.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="facilities-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">World-Class Infrastructure</div>
                <h2 class="section-title">State-of-the-Art Facilities</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-image">
                            <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600&h=400&fit=crop" alt="Flight Simulators">
                            <div class="facility-overlay">
                                <div class="facility-icon-overlay">
                                    <i class="fas fa-gamepad"></i>
                                </div>
                            </div>
                        </div>
                        <div class="facility-content">
                            <h4>Advanced Flight Simulators</h4>
                            <p>Practice in realistic flight conditions with our cutting-edge simulators before actual flying.</p>
                            <ul class="facility-features">
                                <li><i class="fas fa-check"></i> Full motion simulators</li>
                                <li><i class="fas fa-check"></i> Weather simulation</li>
                                <li><i class="fas fa-check"></i> Emergency procedures</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-image">
                            <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600&h=400&fit=crop" alt="Modern Aircraft">
                            <div class="facility-overlay">
                                <div class="facility-icon-overlay">
                                    <i class="fas fa-plane-departure"></i>
                                </div>
                            </div>
                        </div>
                        <div class="facility-content">
                            <h4>Modern Aircraft Fleet</h4>
                            <p>Extensive fleet of well-maintained aircraft for comprehensive training experience.</p>
                            <ul class="facility-features">
                                <li><i class="fas fa-check"></i> Single & multi-engine</li>
                                <li><i class="fas fa-check"></i> Latest avionics</li>
                                <li><i class="fas fa-check"></i> Regular maintenance</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-image">
                            <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=600&h=400&fit=crop" alt="Classrooms">
                            <div class="facility-overlay">
                                <div class="facility-icon-overlay">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                            </div>
                        </div>
                        <div class="facility-content">
                            <h4>Smart Classrooms</h4>
                            <p>Technology-enabled learning spaces for comprehensive ground training and theory classes.</p>
                            <ul class="facility-features">
                                <li><i class="fas fa-check"></i> Interactive learning</li>
                                <li><i class="fas fa-check"></i> Digital resources</li>
                                <li><i class="fas fa-check"></i> Audio-visual aids</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Statistics -->
    <section class="success-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Proven Track Record</div>
                <h2 class="section-title text-white">Our Success in Numbers</h2>
            </div>
            <div class="success-stats-grid">
                <div class="success-stat-card">
                    <div class="success-stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <span class="success-stat-number">500+</span>
                    <span class="success-stat-text">Graduates Successfully Placed</span>
                </div>
                <div class="success-stat-card">
                    <div class="success-stat-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <span class="success-stat-number">95%</span>
                    <span class="success-stat-text">First Attempt Pass Rate</span>
                </div>
                <div class="success-stat-card">
                    <div class="success-stat-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <span class="success-stat-number">50+</span>
                    <span class="success-stat-text">Partner Airlines & Companies</span>
                </div>
                <div class="success-stat-card">
                    <div class="success-stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <span class="success-stat-number">100%</span>
                    <span class="success-stat-text">DGCA Compliance Record</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Training Excellence -->
    <section class="training-excellence-section">
        <div class="container">
            <div class="training-content">
                <div class="section-header">
                    <div class="section-subtitle">Training Excellence</div>
                    <h2 class="section-title">Comprehensive Training Approach</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="training-card">
                            <div class="training-card-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h5>Theory Classes</h5>
                            <p>In-depth ground school covering all subjects required for DGCA exams with experienced instructors.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="training-card">
                            <div class="training-card-icon">
                                <i class="fas fa-helicopter"></i>
                            </div>
                            <h5>Practical Training</h5>
                            <p>Hands-on flight training with modern aircraft ensuring real-world aviation experience.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="training-card">
                            <div class="training-card-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h5>Simulator Sessions</h5>
                            <p>Advanced simulator training for mastering various flight scenarios and emergency procedures.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="training-card">
                            <div class="training-card-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h5>Soft Skills</h5>
                            <p>Communication, leadership, and personality development for successful aviation career.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Section -->
    <section class="comparison-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Compare & Choose</div>
                <h2 class="section-title text-white">VAA vs Other Aviation Academies</h2>
            </div>
            <div class="comparison-table-wrapper">
                <table class="comparison-table table mb-0">
                    <thead>
                        <tr>
                            <th>Features</th>
                            <th>Vihanga Aviation Academy</th>
                            <th>Other Academies</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>DGCA Approved</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Modern Aircraft Fleet</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Advanced Flight Simulators</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Experienced Instructors (5000+ hrs)</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Job Placement Assistance</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Flexible Payment Options</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>International Standards</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Smart Classrooms</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                        <tr>
                            <td>Student Success Rate</td>
                            <td><strong>95%</strong></td>
                            <td><strong>70-80%</strong></td>
                        </tr>
                        <tr>
                            <td>Industry Partnerships</td>
                            <td><i class="fas fa-check-circle check-icon"></i></td>
                            <td><i class="fas fa-times-circle cross-icon"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-vaa-section">
        <div class="container">
            <div class="cta-vaa-content">
                <div class="cta-vaa-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h2>Experience The VAA Advantage</h2>
                <p>Join India's premier aviation training academy and take the first step towards your dream career in aviation with world-class facilities and expert guidance.</p>
                <a href="#" class="btn-join-now">
                    Join VAA Today <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>



@endsection
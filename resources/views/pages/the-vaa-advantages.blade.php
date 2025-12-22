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
            data-background="{{asset( $advantage->banner_image)}}">
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
                    <i class="fas fa-star mr-2"></i>{{ $advantage->sub_title }}
                </span>
                <h1 class="hero-main-title mx-auto">
                    {{ $advantage->title }}
                </h1>
                <p class="hero-description">
                    {{ $advantage->short_description }}
                </p>
                <div class="hero-stats">
                    @if(!empty($advantage->ratings) && is_array($advantage->ratings))
                        @foreach($advantage->ratings as $key => $value)
                            <div class="hero-stat-item">
                                <span class="hero-stat-number">{{ $key }}</span>
                                <span class="hero-stat-label">{{ $value }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose VAA Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">{{ $strength->sub_title }}</div>
                <h2 class="section-title text-white">{{ $strength->title }}</h2>
            </div>
            <div class="row">
                @foreach($strengths as $card)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="{{ $card->card_icon }}"></i>
                        </div>
                        <h4>{{ $card->card_title }}</h4>
                        <p>{{ $card->card_description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="facilities-section">
        <div class="container">

            {{-- Section Header (use first record only) --}}
            @if($infrastructures->count())
                <div class="section-header">
                    <div class="section-subtitle">
                        {{ $infrastructure->sub_title }}
                    </div>
                    <h2 class="section-title">
                        {{ $infrastructure->title }}
                    </h2>
                </div>
            @endif

            <div class="row">

                {{-- CARDS LOOP --}}
                @foreach($infrastructures as $infrastructure)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="facility-card">

                            <!-- Image -->
                            <div class="facility-image">
                                @if($infrastructure->infrastructure_image)
                                    <img
                                        src="{{ asset($infrastructure->infrastructure_image) }}"
                                        alt="{{ $infrastructure->infrastructure_title }}"
                                        class="img-fluid">
                                @endif

                                <!-- Icon Overlay -->
                                <div class="facility-overlay">
                                    <div class="facility-icon-overlay">
                                        <i class="{{ $infrastructure->infrastructure_icon }}"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="facility-content">
                                <h4>{{ $infrastructure->infrastructure_title }}</h4>
                                <p>{{ $infrastructure->infrastructure_description }}</p>

                                <!-- Features -->
                                @if(!empty($infrastructure->features) && is_array($infrastructure->features))
                                    <ul class="facility-features">
                                        @foreach($infrastructure->features as $feature)
                                            <li>
                                                <i class="fas fa-check"></i>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Success Statistics -->
    <section class="success-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">{{ $record->sub_title }}</div>
                <h2 class="section-title text-white">{{ $record->title }}</h2>
            </div>
            <div class="success-stats-grid">
            @foreach($records as $card)
                @php
                    $texts = is_array($card->text)
                        ? $card->text
                        : json_decode($card->text, true);
                @endphp
                @if(!empty($texts))
                    @foreach($texts as $key => $value)
                        <div class="success-stat-card">
                            <div class="success-stat-icon">
                                <i class="{{ $card->icon }}"></i>
                            </div>
                            <span class="success-stat-number">{{ $key }}</span>
                            <span class="success-stat-text">{{ $value }}</span>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
        </div>
    </section>

    <!-- Training Excellence -->
    <section class="training-excellence-section">
        <div class="container">
            <div class="training-content">
                <div class="section-header">
                    <div class="section-subtitle">{{ $excellence->sub_title }}</div>
                    <h2 class="section-title">{{ $excellence->title }}</h2>
                </div>
                <div class="row">
                @foreach($excellences as $div)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="training-card">
                            <div class="training-card-icon">
                                <i class="{{ $div->icon }}"></i>
                            </div>
                            <h5>{{ $div->card_title }}</h5>
                            <p>{{ $div->card_description }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Section -->
    <section class="comparison-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Compare & Choose</div>
                <h2 class="section-title text-white">
                    {{ $academic_feature->sub_title }}
                </h2>
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
                        @foreach ($academic_features as $feature)
                        <tr>
                            <td>{{ $feature->title }}</td>

                            {{-- ================= Vihanga ================= --}}
                            <td class="text-center" style="font-size: 18px">
                                @if($feature->vihanga_type === 'boolean')
                                    @if($feature->vihanga_bool)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                @else
                                    <span class="fw-bold">
                                        {{ $feature->vihanga_text }}
                                    </span>
                                @endif
                            </td>

                            {{-- ================= Other ================= --}}
                            <td class="text-center" style="font-size: 18px">
                                @if($feature->other_type === 'boolean')
                                    @if($feature->other_bool)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                @else
                                    <span class="fw-bold">
                                        {{ $feature->other_text }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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
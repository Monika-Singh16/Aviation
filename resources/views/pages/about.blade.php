@extends('layout.master')
@section('css')
<style>
     :root {
            --primary-color: #dcbb87;
            --dark-text: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
        }
        
        /* Hero Section */
        .hero-section {
            background: #F3F4F8;
            padding:80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            text-align: center;
            /*padding: 2rem 0;*/
        }
        
        .hero-subtitle {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 2rem;
            line-height: 1.2;
        }
        
        .hero-description {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 900px;
            margin: 0 auto 2.5rem;
            line-height: 1.8;
        }
        
        /* Aircraft Section */
        .aircraft-section {
            position: relative;
            padding: 3rem 0;
        }
        
        .aircraft-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .aircraft-image {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            display: block;
        }
        
        /* Flight Info Boxes */
        .flight-info {
            position: absolute;
            background: white;
            border-radius: 10px;
            padding: 1.5rem 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 250px;
        }
        
        .flight-info-icon {
            background: #e74c3c;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        
        .flight-info-text {
            font-size: 0.95rem;
            color: var(--dark-text);
            font-weight: 500;
            line-height: 1.4;
        }
        
        .flight-info-top-left {
            top: 4%;
            left: 11%;
        }
        
        .flight-info-top-right {
            top: 4%;
            right: 11%;
        }
        
        .flight-info-bottom-left {
            bottom: -7%;
            left: 0%;
        }
        
        .flight-info-bottom-right {
            bottom: -7%;
            right: 0%;
        }
        
        /* Responsive */
        /* For 1280x732 and similar resolutions */
        @media (max-width: 1366px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-description {
                font-size: 1rem;
                max-width: 800px;
            }
            
            .flight-info {
                padding: 1.2rem 1.5rem;
                min-width: 220px;
            }
            
            .flight-info-text {
                font-size: 0.85rem;
            }
            
            .flight-info-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 1024px) {
            .hero-section {
                padding: 60px 0;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .flight-info {
                padding: 1rem 1.2rem;
                min-width: 200px;
            }
            
            .flight-info-top-left {
                top: 5%;
                left: 5%;
            }
            
            .flight-info-top-right {
                top: 5%;
                right: 5%;
            }
            
            .flight-info-bottom-left {
                bottom: -5%;
                left: -5%;
            }
            
            .flight-info-bottom-right {
                bottom: -5%;
                right: -5%;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 0;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-description {
                font-size: 0.95rem;
                padding: 0 15px;
            }
            
            .learn-more-btn {
                padding: 0.7rem 2rem;
                font-size: 0.9rem;
            }
            
            .flight-info {
                position: static;
                margin: 1rem auto;
                max-width: 400px;
            }
            
            .aircraft-section {
                padding: 2rem 0;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.5rem;
            }
            
            .hero-subtitle {
                font-size: 0.9rem;
            }
            
            .hero-description {
                font-size: 0.9rem;
            }
            
            .learn-more-btn {
                padding: 0.6rem 1.5rem;
                font-size: 0.85rem;
            }
            
            .flight-info {
                padding: 1rem;
                min-width: auto;
            }
            
            .flight-info-text {
                font-size: 0.85rem;
            }
        }
        
        @media (max-width: 380px) {
            .hero-title {
                font-size: 1.3rem;
            }
            
            .learn-more-btn {
                padding: 0.5rem 1.2rem;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection
@section('content')

    <div class="page-wrapper"></div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Banner
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <section class="banner-section inner-banner-section bg-overlay-black bg_img"
                data-background="{{asset( $about_page->banner_image )}}">
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-12 text-center">
                            <div class="banner-content">
                                <h1 class="title">About-Us</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">About-Us</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start About
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <section class="about-section about--style page-wrapper-two ptb-80">
                <div class="container">
                    <div class="row justify-content-center mb-30-none">
                        <div class="col-xl-6 col-lg-6 mb-30">
                            <div class="about-thumb" data-aos="fade-right" data-aos-duration="1200">
                                <img src="{{asset( $about_page->about_image )}}" alt="about">
                                <div class="about-element-two" data-aos="fade-up" data-aos-duration="1200">
                                    <img src="{{asset('assets/images/element/element-15.png')}}" alt="element">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 mb-30">
                            <div class="about-content" data-aos="fade-left" data-aos-duration="1200">
                                <span class="sub-title text--base">{{ $about_page->title }}</span>
                                <h2 class="title">{{ $about_page->heading }}</h2>
                                <p>{{ $about_page->description }}</p>
                                <div class="about-book-area">
                                    <div class="about-book-element">
                                        <img src="{{asset('assets/images/element/element-7.png')}}" alt="element">
                                    </div>
                                    <div class="about-book-left">
                                        <h3 class="call-title">{{ $about_page->sub_title }}</h3>
                                        <span class="call"><a href="tel:+91 814929 4263">{{ $about_page->number }}</a></span>
                                    </div>
                                    <div class="about-book-right">
                                        <a href="{{url('/enquire')}}" class="btn--base"><i class="icon-btn-icon-v2"></i>
                                            Book Now</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Vission and Mission
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-subtitle">About Us</div>
                    <h1 class="hero-title text-center mx-auto" style="max-width: 850px; text-align: center;">{{ $vision_mission->title }}</h1>
                    <p class="hero-description">
                        {{ $vision_mission->description }}
                    </p>
                </div>
            </div>

            <!-- Aircraft Section -->
            <div class="aircraft-section">
                <div class="container-fluid">
                    <div class="aircraft-container">
                        
                        <div class="flight-info flight-info-top-left">
                            <div class="flight-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="flight-info-text"  style="max-width: 170px;">
                                {{ $vision_mission->card_1 }}
                            </div>
                        </div>
                        
                        <div class="flight-info flight-info-top-right">
                            <div class="flight-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="flight-info-text"  style="max-width: 195px;">
                                {{ $vision_mission->card_2 }}
                            </div>
                        </div>
                        
                        <div class="flight-info flight-info-bottom-left">
                            <div class="flight-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="flight-info-text"  style="max-width: 165px;">
                                {{ $vision_mission->card_3 }}
                            </div>
                        </div>
                        
                        <div class="flight-info flight-info-bottom-right">
                            <div class="flight-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="flight-info-text" style="max-width: 160px;">
                                {{ $vision_mission->card_4 }}
                            </div>
                        </div>

                        <img src="https://hyperflywp.bracketweb.com/wp-content/uploads/2025/07/about-4-image.png" 
                        alt="Private Jet Aircraft" class="aircraft-image">
                    </div>
                </div>
            </div>
        </section>


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        WHY Choose Us
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="choose-section bg--gray ptb-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 text-center">
                        <div class="section-header">
                            <span class="sub-title"><span>Why Us</span></span>
                            <h2 class="section-title">Why Choose Vihanga Aviation Training?</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-30-none">
                    @foreach($why_chooses as $key=>$why_choose)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                            <div class="choose-item">
                                <div class="choose-thumb">
                                    <img src="{{asset($why_choose->image)}}" alt="choose">
                                </div>
                                <span class="num">0{{$key + 1}}</span>
                                <h3 class="title">{{ $why_choose->title }}</h3>
                                <p>{{ $why_choose->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Client Testimonial
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <section class="client-section ptb-80 bg_img" data-background="assets/images/bg/bg-5.png">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 text-center">
                            <div class="section-header">
                                <span class="sub-title"><span>Testimonial</span></span>
                                <h2 class="section-title">What Our Students Say</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="client-slider-two">
                                <div class="swiper-wrapper">
                                    @forelse($testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="client-item">
                                                <div class="client-quote"><i class="icon-quote"></i></div>
                                                <div class="client-content">
                                                    <p>{{ $testimonial->description }}</p>
                                                </div>
                                                <div class="client-footer">
                                                    <div class="client-post-meta">
                                                        <div class="user-thumb">
                                                            <img src="{{ asset($testimonial->image) }}" alt="user">
                                                        </div>
                                                        <span class="name">{{ $testimonial->name }}</span>
                                                    </div>
                                                    <span class="ratings">
                                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="fas fa-star active"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">No testimonials found.</p>
                                    @endforelse
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            faq section
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="faq-section ptb-80">
            <div class="container">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xl-6 col-lg-7 mb-30" data-aos="fade-right" data-aos-duration="1200">
                        <div class="faq-header-area">
                            <span class="sub-title">FAQ</span>
                            <h2 class="title">{{ $faq->heading }}</h2>
                            <p>{{ $faq->description }}</p>
                        </div>
                        <div class="faq-wrapper">
                            @foreach($faqs as $row)
                                <div class="faq-item {{ $loop->first ? 'active open' : '' }}">
                                    <h3 class="faq-title">
                                        <span class="title">{{ $row->question }}</span>
                                        <span class="right-icon"></span>
                                    </h3>

                                    <div class="faq-content">
                                        <p>{{ $row->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 mb-30">
                        <div class="faq-thumb" data-aos="fade-left" data-aos-duration="1200">
                            <img src="{{asset( $faq->image )}}" alt="faq">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
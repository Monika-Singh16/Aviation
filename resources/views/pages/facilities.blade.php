@extends('layout.master')

@section('css')
    <style>
        body {
            background: #ffffff;
            font-family: system-ui;
        }

        .section-space {
            padding: 40px 0
        }

        /* FEATURE ROW */
        .feature-row {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .feature-row.reverse {
            flex-direction: row-reverse
        }

        .feature-content {
            flex: 1
        }

        .feature-content span {
            font-size: 14px;
            letter-spacing: 2px;
            font-weight: 600
        }

        .h3 {
            font-size: 32px;
            font-weight: 700;
            margin: 15px 0;
            color: #dcbb87;
        }

        .card i {
            color: #dcbb87;
        }

        @media(max-width:991px) {

            .feature-row,
            .feature-row.reverse {
                flex-direction: column
            }
        }

        .stat-item {
            text-align: center;
            padding: 20px 10px;
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .feature-content p::before {
            content: none !important;
            display: none !important;
        }

        .feature-content p {
            padding-bottom: 5px !important;
        }

        .card-body {
            padding: 20px 30px;
        }

        .no-padding-btn {
            padding: 0 !important;
        }

        .feature-img {
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1
        }

        .feature-img img {
            width: 100%;
            height: 90%;
            object-fit: cover;
            border-radius: 18px
        }

        .fleet-hero {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            color: #fff;
        }

        .fleet-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .fleet-hero img.bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        .fleet-content {
            position: relative;
            z-index: 2;
        }

        .fleet-stats {
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
        }

        .fleet-stat-item h2 {
            color: #ff8c1a;
            font-weight: 700;
        }

        @media(max-width:768px) {
            .fleet-hero {
                min-height: auto;
                padding: 80px 0;
            }
        }

        /* Feature Accordion Wrapper */
        .feature-content .card {
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 0;
            background: transparent;
        }

        /* Header clean */
        .feature-content .card-header {
            background: transparent;
            padding: 12px 0;
            border: none;
        }

        /* Button design */
        .accordion-btn {
            width: 100%;
            display: flex;
            align-items: center;
            background: none;
            border: none;
            padding: 0;
            font-weight: 600;
            font-size: 16px;
            color: #222;
            transition: all .3s ease;
            text-align: left;
        }

        /* Icon style */
        .accordion-btn .icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f3f5f7;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: #555;
            transition: all .3s ease;
        }

        /* Hover */
        .accordion-btn:hover .icon {
            background: #0d6efd;
            color: #fff;
        }

        /* Active state */
        .accordion-btn:not(.collapsed) {
            color: #0d6efd;
        }

        .accordion-btn:not(.collapsed) .icon {
            background: #0d6efd;
            color: #fff;
        }

        /* Body text */
        .feature-content .card-body {
            padding: 8px 0 16px 48px;
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        /* Image alignment */
        .feature-img img {
            max-height: 420px;
            object-fit: cover;
        }

        /* Accordion header base */
        .aircraft-accordion .card-header {
            position: relative;
        }

        /* LEFT PROCESS LINE (STATIC BASE) */
        .aircraft-accordion .card-header::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 0;
            width: 2px;
            height: 100%;
            background: #dcbb87;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* ACTIVE / RUNNING STATE */
        .aircraft-accordion .card-header.active::before {
            opacity: 1;
        }

        /* CARD RELATIVE */
        .aircraft-accordion .card {
            position: relative;
        }

        /* LINE HOLDER */
        .aircraft-accordion .progress-line {
            position: absolute;
            left: -12px;
            top: 0;
            width: 3px;
            height: 100%;
            background: rgba(220, 187, 135, 0.3);
            overflow: hidden;

            /* 🔴 HIDDEN BY DEFAULT */
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* FILL ANIMATION */
        .aircraft-accordion .progress-fill {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 0%;
            background: #dcbb87;
            transition: height linear;
        }

        /* SHOW ONLY DURING PROCESS */
        .aircraft-accordion .card.processing .progress-line {
            opacity: 1;
        }

        .flight-readiness {
            min-height: 45vh;
            display: flex;
            align-items: center;
        }

        .flight-line {
            height: 260px;
            width: 3px;
            background: linear-gradient(to bottom, transparent, #dcbb87, transparent);
            margin: auto;
        }

        .flight-tag {
            letter-spacing: 3px;
            font-size: 12px;
            color: #dcbb87;
            font-weight: 600;
        }

        .flight-title {
            font-size: 3rem;
            font-weight: 500;
            margin: 25px 0 15px;
        }

        .flight-sub {
            max-width: 680px;
            margin: auto;
            font-size: 16px;
            color: rgba(255, 255, 255, .8);
        }

        .flight-controls {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .control {
            padding: 10px 34px;
            border-radius: 40px;
            font-weight: 600;
            text-decoration: none;
            transition: all .3s ease;
        }

        .control.ghost {
            background: #b11217;
            color: #fff;
        }

        .control.ghost:hover {
            background-color: #dcbb87;
        }

        .flight-meta {
            font-size: 12px;
            writing-mode: vertical-rl;
            opacity: .5;
        }
    </style>
@endsection
@section('content')
    {{-- <section class="banner-section inner-banner-section bg-overlay-black bg_img"
            data-background="{{asset('assets/images/aviation/home_page/bgimg/inner-bg.png')}}">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 text-center">
                        <div class="banner-content">
                            <h1 class="title">Facilities</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Facilities</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section> --}}

    {{-- <header class="fleet-hero">
        <!-- BACKGROUND IMAGE -->
        <img src="{{ asset('assets/images/aviation/facilities/banner1.jpg') }}"
            class="bg-img" alt="Fleet Background">

        <div class="container fleet-content text-center">
            <div class="row justify-content-center">
                <div class="col-lg-9" style="top: 160px;">

                    <h1 class="fw-bold mb-3 text-white">Premier Training Fleet</h1>

                    <p class="fs-5 text-light">
                    In the ever-evolving world of Aviation, Chimes Aviation Academy proudly distinguishes itself through its outstanding collection of aircraft, which display both quality and versatility in top-quality flying training.
                    </p>

                    <!-- STATS BOX -->
                    <div class="fleet-stats mt-4">
                        <div class="row text-center gy-4">

                            <div class="col-6 col-md-3 fleet-stat-item">
                            <h2>10</h2>
                            <p class="mb-0">Cessna 172 R/S</p>
                            </div>

                            <div class="col-6 col-md-3 fleet-stat-item">
                            <h2>10</h2>
                            <p class="mb-0">Piper Archer DX</p>
                            </div>

                            <div class="col-6 col-md-3 fleet-stat-item">
                            <h2>04</h2>
                            <p class="mb-0">Tecnam P2010</p>
                            </div>

                            <div class="col-6 col-md-3 fleet-stat-item">
                            <h2>03</h2>
                            <p class="mb-0">Diamond DA42</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <header class="fleet-hero">
        <!-- BACKGROUND IMAGE -->
        <img src="{{ asset('admin-assets/facility-hero/' . $hero->image) }}" class="bg-img" alt="Fleet Background">

        <div class="container fleet-content text-center">
            <div class="row justify-content-center">
                <div class="col-lg-9" style="top: 160px;">

                    <h1 class="fw-bold mb-3 text-white">{{ $hero->heading }}</h1>

                    <p class="fs-5 text-light">
                        {{ $hero->desc }}</p>

                    <!-- STATS BOX -->
                    <div class="fleet-stats mt-4">
                        <div class="row text-center gy-4">
                            @foreach ($hero->stat as $stat)
                                <div class="col-6 col-md-3 fleet-stat-item">
                                    <h2>{{ $stat['value'] }}</h2>
                                    <p>{{ $stat['label'] }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- FEATURES -->
    {{-- <section class="section-space">
        <div class="container">

            <div class="feature-row row align-items-center">
                <div class="col-12 text-center">
                    <h3 class="mt-2 font-weight-bold h3">CESSNA 172 R/S</h3>
                    <p class="text-muted text-justify mx-auto" style="max-width: 900px;">
                        The Cessna 172 R/S is one of the most popular and trusted aircraft for flying training.
                        It embodies reliability and advanced training capabilities. Renowned for its gracious
                        flight characteristics and robust design, this iconic aircraft provides an ideal
                        learning platform for aspiring pilots.
                    </p>
                </div>
                <!-- LEFT IMAGE -->
                <div class="col-md-6 text-center feature-img order-md-1">
                    <img id="aircraftMainImage1"
                        <!-- src="{{ asset('assets/images/aviation/gallery_aviation/6.jpg') }}" -->
                        alt="Cessna 172"
                        class="aircraftMainImage1 img-fluid rounded shadow">
                </div>
                <!-- RIGHT CONTENT -->
                <div class="col-md-6 feature-content order-md-2">
                    <!-- SUB FEATURES -->
                    <div id="aircraftAccordion1" class="aircraft-accordion mt-2">
                        <!-- ITEM 1 -->
                        <div class="card mb-1">

                            <div class="progress-line">
                                <span class="progress-fill"></span>
                            </div>

                            <div class="card-header" id="a1-headingOne">
                            <h5 class="mb-0">
                                <button class="btn text-left p-0 no-padding-btn"
                                data-toggle="collapse"
                                data-target="#a1-collapseOne"
                                data-image="{{ asset('assets/images/aviation/gallery_aviation/6.jpg') }}"
                                aria-expanded="true">
                                <i class="fa fa-gauge-high mr-2"></i>
                                Dimensions
                                </button>
                            </h5>
                            </div>

                            <div id="a1-collapseOne"
                            class="collapse show"
                            data-parent="#aircraftAccordion1">
                            <div class="card-body">
                                <p>
                                    Wingspan- 35 ft 8 in / 10.9 m
                                    <br>
                                    Height-8 ft 8 in / 2.7 m
                                    <br>
                                    Length- 26 ft 9 in / 8.2 m
                                </p>
                            </div>
                            </div>
                        </div>

                        <!-- ITEM 2 -->
                        <div class="card mb-1">

                            <div class="progress-line">
                                <span class="progress-fill"></span>
                            </div>

                            <div class="card-header" id="a1-headingTwo">
                            <h5 class="mb-0">
                                <button class="btn collapsed text-left p-0 no-padding-btn"
                                data-toggle="collapse"
                                data-target="#a1-collapseTwo"
                                data-image="{{ asset('assets/images/aviation/gallery_aviation/1.jpg') }}">
                                <i class="fa fa-plane mr-2"></i>
                                Avionics
                                </button>
                            </h5>
                            </div>

                            <div id="a1-collapseTwo"
                            class="collapse"
                            data-parent="#aircraftAccordion1">
                            <div class="card-body">
                                Garmin G1000 NAV III / G1000Nxi Avionics Suite GTX-345R Transponder (ADS-B IN and OUT)
                            </div>
                            </div>
                        </div>

                        <!-- ITEM 3 -->
                        <div class="card mb-1">

                            <div class="progress-line">
                                <span class="progress-fill"></span>
                            </div>

                            <div class="card-header" id="a1-headingThree">
                            <h5 class="mb-0">
                                <button class="btn collapsed text-left p-0 no-padding-btn"
                                data-toggle="collapse"
                                data-target="#a1-collapseThree"
                                data-image="{{ asset('assets/images/aviation/gallery_aviation/3.jpg') }}">
                                <i class="fa fa-gas-pump mr-2"></i>
                                Max range
                                </button>
                            </h5>
                            </div>

                            <div id="a1-collapseThree"
                            class="collapse"
                            data-parent="#aircraftAccordion1">
                            <div class="card-body">
                                730 nm / 1,352 km
                            </div>
                            </div>
                        </div>

                        <!-- ITEM 4 -->
                        <div class="card mb-1">

                            <div class="progress-line">
                                <span class="progress-fill"></span>
                            </div>

                            <div class="card-header" id="a1-headingFour">
                            <h5 class="mb-0">
                                <button class="btn collapsed text-left p-0 no-padding-btn"
                                data-toggle="collapse"
                                data-target="#a1-collapseFour"
                                data-image="{{ asset('assets/images/aviation/gallery_aviation/4.jpg') }}">
                                <i class="fa fa-user mr-2"></i>
                                Fuel Capacity
                                </button>
                            </h5>
                            </div>

                            <div id="a1-collapseFour"
                            class="collapse"
                            data-parent="#aircraftAccordion1">
                            <div class="card-body">
                                45 US Gal / 172 ltrs.
                            </div>
                            </div>
                        </div>

                        <!-- ITEM 5 -->
                        <div class="card mb-1">

                            <div class="progress-line">
                                <span class="progress-fill"></span>
                            </div>

                            <div class="card-header" id="a1-headingFive">
                            <h5 class="mb-0">
                                <button class="btn collapsed text-left p-0 no-padding-btn"
                                data-toggle="collapse"
                                data-target="#a1-collapseFive"
                                data-image="{{ asset('assets/images/aviation/gallery_aviation/3.jpg') }}">
                                <i class="fa fa-gas-pump mr-2"></i>
                                Engine
                                </button>
                            </h5>
                            </div>

                            <div id="a1-collapseFive"
                            class="collapse"
                            data-parent="#aircraftAccordion1">
                            <div class="card-body">
                                Continental CD-135 (Jet A1/ ATF) with FADEC
                            </div>
                            </div>
                        </div>

                        <!-- ITEM 6 -->
                        <div class="card mb-1">

                            <div class="progress-line">
                                <span class="progress-fill"></span>
                            </div>

                            <div class="card-header" id="a1-headingSix">
                            <h5 class="mb-0">
                                <button class="btn collapsed text-left p-0 no-padding-btn"
                                data-toggle="collapse"
                                data-target="#a1-collapseSix"
                                data-image="{{ asset('assets/images/aviation/gallery_aviation/4.jpg') }}">
                                <i class="fa fa-user mr-2"></i>
                                Max Cruise Speed
                                </button>
                            </h5>
                            </div>

                            <div id="a1-collapseSix"
                            class="collapse"
                            data-parent="#aircraftAccordion1">
                            <div class="card-body">
                                111 kts TAS / 206 km/h
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    @foreach ($aircrafts as $index => $ac)
        @php
            $index = (int) $index; // ensure integer
            $isEven = $index % 2 != 0;
            $bgColor = $isEven ? '#F3F4F8' : '#fff';
            $imageOrderClass = $isEven ? 'order-md-2' : 'order-md-1';
            $contentOrderClass = $isEven ? 'order-md-1' : 'order-md-2';
        @endphp

        <section class="section-space" style="background-color: {{ $bgColor }}">
            <div class="container">
                <div class="feature-row row align-items-center">

                    <!-- TITLE -->
                    <div class="col-12 text-center">
                        <h3 class="mt-2 font-weight-bold h3">{{ $ac['title'] }}</h3>
                        <p class="text-muted text-justify mx-auto" style="max-width: 900px;">
                            {!! $ac['desc'] !!}
                        </p>
                    </div>

                    <!-- IMAGE -->
                    <div class="col-md-6 text-center feature-img {{ $imageOrderClass }}">
                        <img src="{{ isset($ac['features'][0]['image']) ? asset($ac['features'][0]['image']) : '' }}"
                            class="img-fluid rounded shadow" alt="{{ $ac['title'] }}">
                    </div>

                    <!-- CONTENT / ACCORDION -->
                    <div class="col-md-6 feature-content {{ $contentOrderClass }}">
                        <div class="aircraft-accordion mt-2">
                            @foreach ($ac->features as $key => $feature)
                                <div class="card mb-1">
                                    <div class="progress-line">
                                        <span class="progress-fill"></span>
                                    </div>
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn {{ $key != 0 ? 'collapsed' : '' }} text-left p-0 no-padding-btn"
                                                data-toggle="collapse"
                                                data-target="#collapse{{ $index }}-{{ $key }}"
                                                data-image="{{ asset($feature['image'] ?? '') }}">
                                                <i class="{{ $feature['icon'] ?? '' }} mr-2"></i>
                                                {{ $feature['title'] }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{ $index }}-{{ $key }}"
                                        class="collapse {{ $key == 0 ? 'show' : '' }}">
                                        <div class="card-body">
                                            {!! $feature['description'] !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endforeach

    <section class="flight-readiness">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT INDICATOR -->
                <div class="col-md-1 d-none d-md-block">
                    <div class="flight-line"></div>
                </div>

                <!-- MAIN CONTENT -->
                <div class="col-md-10 text-center">

                    <span class="flight-tag">TRAINING FLEET BRIEFING</span>

                    <h2 class="flight-title">
                        Fly the aircraft that pilots trust for real-world training
                    </h2>
                    <!-- ACTION CONTROLS -->
                    <div class="flight-controls">
                        <a href="{{ url('/enquire') }}" class="control primary btn--base">Enquire</a>
                        <a href="#" class="control ghost">Schedule Visit</a>
                    </div>

                </div>

                <!-- LEFT INDICATOR -->
                <div class="col-md-1 d-none d-md-block">
                    <div class="flight-line"></div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- <script>
        $(document).ready(function() {

            function initAircraftAccordion(accordionSelector, imageSelector) {

                var $accordion = $(accordionSelector);
                var $items = $accordion.find('.collapse');
                var duration = 5000;

                var currentIndex = 0;
                var timer = null;

                function resetProgress() {
                    $accordion.find('.card')
                        .removeClass('processing')
                        .find('.progress-fill')
                        .css({
                            height: '0%',
                            transition: 'none'
                        });
                }

                function animateProgress($collapse) {
                    var $card = $collapse.closest('.card');
                    var $fill = $card.find('.progress-fill');

                    $card.addClass('processing');

                    setTimeout(function() {
                        $fill.css({
                            height: '100%',
                            transition: 'height ' + duration + 'ms linear'
                        });
                    }, 20);
                }

                function changeImage($collapse) {
                    var img = $accordion
                        .find('[data-target="#' + $collapse.attr('id') + '"]')
                        .data('image');

                    if (img) {
                        $(imageSelector)
                            .stop(true, true)
                            .fadeOut(200, function() {
                                $(this).attr('src', img).fadeIn(300);
                            });
                    }
                }

                function runAccordion() {

                    clearTimeout(timer);
                    resetProgress();

                    var $current = $items.eq(currentIndex);
                    $current.collapse('show');

                    animateProgress($current);
                    changeImage($current);

                    timer = setTimeout(function() {
                        currentIndex = (currentIndex + 1) % $items.length;
                        runAccordion();
                    }, duration);
                }

                // CLICK SUPPORT
                $accordion.find('[data-toggle="collapse"]').on('click', function() {

                    clearTimeout(timer);

                    var targetId = $(this).data('target');
                    var $targetCollapse = $(targetId);

                    currentIndex = $items.index($targetCollapse);

                    runAccordion();
                });

                // START
                runAccordion();
            }

            // 🔥 INIT ALL AIRCRAFT ACCORDIONS
            initAircraftAccordion('#aircraftAccordion1', '#aircraftMainImage1');
            initAircraftAccordion('#aircraftAccordion2', '#aircraftMainImage2');
            initAircraftAccordion('#aircraftAccordion3', '#aircraftMainImage3');
            initAircraftAccordion('#aircraftAccordion4', '#aircraftMainImage4');

        });
    </script> --}}
    <script>
    $(document).ready(function() {
        $('.aircraft-accordion').each(function() {
            let $accordion = $(this);
            let $items = $accordion.find('.collapse');
            let $image = $accordion.closest('.feature-row').find('.feature-img img'); // fixed
            let duration = 5000;
            let currentIndex = 0;
            let timer;

            function resetProgress() {
                $accordion.find('.card').removeClass('processing').find('.progress-fill').css({height:'0%', transition:'none'});
            }

            function animateProgress($collapse) {
                let $card = $collapse.closest('.card');
                let $fill = $card.find('.progress-fill');
                $card.addClass('processing');
                setTimeout(() => {
                    $fill.css({height:'100%', transition:'height '+duration+'ms linear'});
                }, 20);
            }

            function changeImage($collapse) {
                let img = $accordion.find('[data-target="#'+$collapse.attr('id')+'"]').data('image');
                if(img) {
                    $image.stop(true,true).fadeOut(200, function() {
                        $(this).attr('src', img).fadeIn(300);
                    });
                }
            }

            function runAccordion() {
                clearTimeout(timer);
                resetProgress();

                let $current = $items.eq(currentIndex);

                // hide others, NOT current
                $items.not($current).collapse('hide');
                $current.collapse('show');

                animateProgress($current);
                changeImage($current);

                timer = setTimeout(function() {
                    currentIndex = (currentIndex + 1) % $items.length;
                    runAccordion();
                }, duration);
            }

            // CLICK SUPPORT
            $accordion.find('[data-toggle="collapse"]').on('click', function() {
                clearTimeout(timer);
                let targetId = $(this).data('target');
                let $targetCollapse = $(targetId);
                currentIndex = $items.index($targetCollapse);
                runAccordion();
            });

            runAccordion();
        });
    });
    </script>

@endsection
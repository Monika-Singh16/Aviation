@extends('layout.master')
<style>
    /* ================================
   Training Section Styles
   ================================ */
    .training-section {
    background: linear-gradient(135deg, #ffffff 0%, #f5f7fa 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
    }

    .training-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
        radial-gradient(circle at 20% 30%, rgba(201,169,97,0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(201,169,97,0.03) 0%, transparent 50%);
    pointer-events: none;
    }

    .training-section::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
        linear-gradient(rgba(201,169,97,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,169,97,0.03) 1px, transparent 1px);
    background-size: 40px 40px;
    animation: gridMove 30s linear infinite;
    pointer-events: none;
    }

    @keyframes gridMove {
    0% { transform: translate(0, 0); }
    100% { transform: translate(40px, 40px); }
    }

    /* Section Header */
    .section-header {
    text-align: center;
    margin-bottom: 80px;
    position: relative;
    z-index: 1;
    }

    .section-tag {
    display: inline-block;
    padding: 10px 30px;
    background: #fff;
    border: 2px solid #c9a961;
    border-radius: 50px;
    color: #c9a961;
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(201,169,97,0.2);
    }

    .section-title {
    font-size: 3.5rem;
    font-weight: 900;
    color: #2c3e50;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 2px;
    }

    .section-title .highlight {
    color: #c9a961;
    }

    .section-description {
    font-size: 1.2rem;
    color: #5a6c7d;
    max-width: 750px;
    margin: 0 auto 30px;
    line-height: 1.8;
    }

    .section-divider {
    width: 100px;
    height: 4px;
    background: #c9a961;
    margin: 0 auto;
    border-radius: 2px;
    }

    /* ================================
    Training Module Zig-Zag Layout
    ================================ */
    .training-module {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    margin-bottom: 80px;
    overflow: hidden;
    transition: all 0.5s ease;
    border: 2px solid transparent;
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: center;
    width: 80%;
    }

    /* ✅ Correct Zig-Zag: 1st Left, 2nd Right, 3rd Left */
    .training-section .training-module:nth-of-type(odd) {
    margin-right: auto;
    margin-left: 0;
    }

    .training-section .training-module:nth-of-type(even) {
    margin-left: auto;
    margin-right: 0;
    /* reverse content order for right-side card */
    }

    .training-section .training-module:nth-of-type(even) .module-inner {
    flex-direction: row-reverse;
    }

    /* Inner Layout */
    .module-inner {
    display: flex;
    align-items: center;
    min-height: 350px;
    }

    /* Hover Effect */
    .training-module:hover {
    box-shadow: 0 20px 60px rgba(201,169,97,0.25);
    border-color: #c9a961;
    transform: translateY(-10px);
    }

    .training-module::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: linear-gradient(180deg, #c9a961, #d4b577);
    transition: width 0.5s ease;
    }

    .training-module:hover::before {
    width: 100%;
    opacity: 0.05;
    }

    /* Module Number Section */
    .module-number-section {
    flex: 0 0 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #c9a961, #d4b577);
    height: 350px;
    position: relative;
    overflow: hidden;
    }

    .training-module:nth-of-type(even) .module-number-section {
    background: linear-gradient(135deg, #2c3e50, #34495e);
    }

    .module-number-section::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200px;
    height: 200px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    }

    .module-number {
    font-size: 5rem;
    font-weight: 900;
    color: rgba(255,255,255,0.9);
    text-shadow: 3px 3px 10px rgba(0,0,0,0.2);
    position: relative;
    z-index: 1;
    }

    /* Module Content */
    .module-content {
    flex: 1;
    padding: 25px 30px;
    }

    .module-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, rgba(201,169,97,0.1), rgba(201,169,97,0.05));
    border: 3px solid #c9a961;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    transition: all 0.5s ease;
    }

    .training-module:hover .module-icon {
    transform: rotate(360deg);
    background: linear-gradient(135deg, #c9a961, #d4b577);
    }

    .module-icon i {
    font-size: 2.5rem;
    color: #c9a961;
    transition: color 0.5s ease;
    }

    .training-module:hover .module-icon i {
    color: #fff;
    }

    .module-title {
    font-size: 2rem;
    font-weight: 800;
    color: #2c3e50;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    }

    .module-title .highlight {
    color: #c9a961;
    }

    .module-description {
    font-size: 1rem;
    color: #5a6c7d;
    line-height: 1.7;
    margin-bottom: 25px;
    }

    /* Feature Grid */
    .feature-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-bottom: 25px;
    }

    .feature-box {
    background: #f8f9fa;
    padding: 15px 20px;
    border-radius: 12px;
    border-left: 4px solid #c9a961;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 12px;
    }

    .feature-box:hover {
    background: #c9a961;
    transform: translateX(10px);
    }

    .feature-box i {
    color: #c9a961;
    font-size: 1.1rem;
    transition: color 0.3s ease;
    }

    .feature-box:hover i {
    color: #fff;
    }

    .feature-box span {
    color: #2c3e50;
    font-size: 0.9rem;
    font-weight: 600;
    transition: color 0.3s ease;
    }

    .feature-box:hover span {
    color: #fff;
    }

    /* Module Stats */
    .module-stats {
    display: flex;
    gap: 40px;
    padding-top: 25px;
    border-top: 2px solid #e9ecef;
    }

    .stat-box {
    display: flex;
    align-items: center;
    gap: 15px;
    }

    .stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #c9a961, #d4b577);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.2rem;
    }

    .stat-info .stat-number {
    font-size: 1.8rem;
    font-weight: 900;
    color: #c9a961;
    line-height: 1;
    display: block;
    }

    .stat-info .stat-label {
    font-size: 0.8rem;
    color: #5a6c7d;
    text-transform: uppercase;
    letter-spacing: 1px;
    }

    /* ================================
    Responsive
    ================================ */
    @media (max-width: 992px) {
    .training-module {
        width: 100%;
        margin: 0 auto 40px;
    }

    .module-inner {
        flex-direction: column !important;
        text-align: center !important;
    }

    .module-number-section {
        height: 200px;
    }

    .module-content {
        padding: 30px;
    }
    }


    /* Admission Section */
    .admission-section {
        background: linear-gradient(135deg, #11152a 0%, #1a1f3c 100%);
        position: relative;
        overflow: hidden;
    }
    
    .admission-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #C9A961 0%, #e0c882 50%, #C9A961 100%);
    }
    
    .admission-section .section-header {
        position: relative;
        margin-bottom: 4rem;
    }
    
    .admission-section .section-header h2 {
        color: #C9A961;
        font-weight: 700;
        letter-spacing: 2px;
        position: relative;
        display: inline-block;
    }
    
    .admission-section .section-header h2::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #C9A961, transparent);
    }
    
    .admission-section .section-header p {
        color: #a8a8b8;
        font-size: 1.1rem;
        margin-top: 2rem;
    }
    
    .info-card {
        background: linear-gradient(145deg, #1a1f3c 0%, #242947 100%);
        border-radius: 15px;
        padding: 2rem;
        height: 100%;
        border: 1px solid rgba(201, 169, 97, 0.1);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(201, 169, 97, 0.05) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(201, 169, 97, 0.2);
        border-color: rgba(201, 169, 97, 0.3);
    }
    
    .info-card:hover::before {
        opacity: 1;
    }
    
    .card-header-custom {
        color: #C9A961;
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        letter-spacing: 1px;
    }
    
    .card-header-custom i {
        font-size: 1.8rem;
        margin-right: 1rem;
        color: #C9A961;
        background: rgba(201, 169, 97, 0.1);
        padding: 12px;
        border-radius: 10px;
    }
    
    .eligibility-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .eligibility-list li {
        color: #e0e0e8;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        line-height: 1.8;
        display: flex;
        align-items: flex-start;
    }
    
    .eligibility-list li:last-child {
        border-bottom: none;
    }
    
    .eligibility-list li::before {
        content: '\f00c';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #C9A961;
        margin-right: 1rem;
        font-size: 0.9rem;
        margin-top: 3px;
        flex-shrink: 0;
    }
    
    .eligibility-list li strong {
        color: #C9A961;
        font-weight: 600;
    }
    
    .stage-item {
        background: rgba(201, 169, 97, 0.05);
        border-left: 3px solid #C9A961;
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .stage-item:hover {
        background: rgba(201, 169, 97, 0.1);
        transform: translateX(5px);
    }
    
    .stage-item strong {
        color: #C9A961;
        font-size: 1.1rem;
        display: block;
        margin-bottom: 0.5rem;
    }
    
    .stage-item p {
        color: #b8b8c8;
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
    
    .stage-item .fee-tag {
        background: linear-gradient(135deg, #C9A961 0%, #e0c882 100%);
        color: #11152a;
        padding: 0.3rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
        font-size: 0.95rem;
    }
    
    .btn-custom {
        background: transparent;
        border: 2px solid #C9A961;
        color: #C9A961;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
        font-size: 0.85rem;
    }
    
    .btn-custom:hover {
        background: #C9A961;
        color: #11152a;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(201, 169, 97, 0.4);
        text-decoration: none;
    }
    
    .highlight-card {
        background: #fff;
        color: #11152a;
        border-radius: 15px;
        padding: 2.5rem;
        text-align: center;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
    }
    
    .highlight-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .highlight-card:hover::before {
        opacity: 1;
    }
    
    .highlight-card:hover {
        transform: translateY(-5px);
        /*box-shadow: 0 15px 35px rgba(201, 169, 97, 0.5);*/
    }
    
    .highlight-card h4 {
        color: #11152a;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }
    
    .highlight-card i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }
    
    .highlight-card p {
        color: #0a0e1f;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .highlight-card .price {
        font-size: 1.8rem;
        font-weight: 700;
        color: #11152a;
        margin: 1rem 0;
    }
    
    .btn-dark-custom {
        background: #11152a;
        color: #C9A961;
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-dark-custom:hover {
        background: #1a1f3c;
        color: #e0c882;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(17, 21, 42, 0.5);
        text-decoration: none;
    }
    
    .loi-notice {
        background: rgba(201, 169, 97, 0.1);
        border: 2px dashed #C9A961;
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        margin-top: 2rem;
        color: #e0c882;
        font-weight: 500;
    }
    
    .loi-notice i {
        color: #C9A961;
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #cbb47f 0%, #db9d20 100%);
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 20px,
            rgba(255,255,255,0.05) 20px,
            rgba(255,255,255,0.05) 40px
        );
        animation: stripesMove 20s linear infinite;
    }

    @keyframes stripesMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(40px, 40px); }
    }

    .cta-content {
        position: relative;
        z-index: 1;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1a1a2e;
        margin-bottom: 20px;
    }

    .cta-text {
        font-size: 1.2rem;
        color: #1a1a2e;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    .cta-btn {
        display: inline-block;
        padding: 18px 50px;
        background: #1a1a2e;
        color: #c9a961;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .cta-btn:hover {
        background: #fff;
        color: #1a1a2e;
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        text-decoration: none;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .training-section .section-title {
            font-size: 2.8rem;
        }

        .training-module {
            width: 95% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .module-inner {
            flex-direction: column !important;
        }

        .module-number-section {
            flex: 0 0 120px;
            width: 100%;
            height: 120px;
        }

        .module-number {
            font-size: 3.5rem;
        }

        .module-content {
            padding: 35px 30px;
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .training-section {
            padding: 60px 0;
        }

        .training-section .section-title {
            font-size: 2.3rem;
        }

        .section-description {
            font-size: 1.05rem;
        }

        .training-module {
            width: 100% !important;
        }

        .module-title {
            font-size: 1.7rem;
        }

        .module-stats {
            flex-direction: column;
            gap: 20px;
        }

        .info-card {
            margin-bottom: 2rem;
        }
        
        .admission-section .section-header h2 {
            font-size: 1.8rem;
        }
        
        .card-header-custom {
            font-size: 1.2rem;
        }

        .cta-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .training-section .section-title {
            font-size: 2rem;
        }

        .module-number-section {
            flex: 0 0 100px;
            height: 100px;
        }

        .module-number {
            font-size: 3rem;
        }

        .module-content {
            padding: 25px 20px;
        }

        .module-icon {
            width: 65px;
            height: 65px;
        }

        .module-icon i {
            font-size: 2rem;
        }

        .module-title {
            font-size: 1.5rem;
        }
    }

    /* Intro Section */
     .hero-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        position: relative;
        min-height: 90vh;
    }

    .hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: #dcbb87;
    line-height: 1.2;
    }

    .hero-description {
    font-size: 1.1rem;
    color: #6c757d;
    line-height: 1.8;
    }

    /* Right-side elements */
    .private-jet-box {
    position: absolute;
    top: 100px;
    right: -90px;
    width: 600px;
    height: 400px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: slideDown 1.5s ease-out forwards;
    opacity: 0;
    }

    @keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-100px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
    }

    .private-jet-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .circular-image {
    position: absolute;
        bottom: -207px;
        right: 339px;
        max-width: 100%;
        height: auto;
        border-radius: 135px;
        overflow: hidden;
        border: 5px solid #fff;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        animation: slideRight 1.5s 
        ease-out 0.5s forwards;
        opacity: 0;
        z-index: 5;
    }

    @keyframes slideRight {
    from {
        opacity: 0;
        transform: translateX(-200px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
    }

    .circular-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .airplane {
        position: absolute;
        top: 331px;
        right: -315px;
        width: 700px;
        opacity: 0;
        animation: flyIn 2s 
        ease-out 1s forwards;
        z-index: 999;
    }

    @keyframes flyIn {
    from {
        opacity: 0;
        transform: translateX(300px) translateY(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0) translateY(0);
    }
    }

    .airplane img {
    width: 100%;
    height: auto;
    filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.2));
    }

    .cloud {
    position: absolute;
    top: 50px;
    left: 100px;
    width: 200px;
    opacity: 0.3;
    }

    /* Responsive */
    @media (max-width: 1200px) {
    .hero-title {
        font-size: 3rem;
    }
    .private-jet-box {
        width: 500px;
        height: 350px;
        right: 50px;
    }
    .circular-image {
        width: 280px;
        height: 280px;
        right: 400px;
    }
    .airplane {
        width: 550px;
    }
    }

    @media (max-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
    .private-jet-box {
        width: 400px;
        height: 300px;
        right: 30px;
        top: 50px;
    }
    .circular-image {
        width: 220px;
        height: 220px;
        right: 300px;
        bottom: 50px;
    }
    .airplane {
        width: 450px;
    }
    }

    @media (max-width: 768px) {
    .hero-section {
        padding: 40px 0;
    }
    .hero-title {
        font-size: 2rem;
    }
    .private-jet-box,
    .circular-image,
    .airplane {
        display: none;
    }
    }

</style>

@section('content')
<div class="page-wrapper">
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="banner-section inner-banner-section bg-overlay-black bg_img"
        data-background="{{asset('assets/images/aviation/home_page/bgimg/inner-bg.png')}}">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 text-center">
                    <div class="banner-content">
                        <h1 class="title">Our Courses</h1>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Courses</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Intro Section
     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="hero-section py-5 position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6 col-md-12 p-5">
                    <h1 class="hero-title mb-4">
                        {{ $course_about->title ?? '' }}
                    </h1>
                    <p class="hero-description mb-4">
                        {{ $course_about->description ?? '' }}
                    </p>
                    <a href="{{ url('/courses-details') }}" class="btn--base">
                        Learn More US <i class="icon-Group-2361 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Right Image Group -->
            @if(!empty($course_about) && !empty($course_about->image_1))
            <div class="private-jet-box">
                <img src="{{ asset($course_about->image_1) }}" alt="Private Jet Interior" />
            </div>
            @endif

            @if(!empty($course_about) && !empty($course_about->image_2))
            <div class="circular-image">
                <img src="{{ asset($course_about->image_2) }}" alt="Woman in Private Jet" />
            </div>
            @endif

            @if(!empty($course_about) && !empty($course_about->image_3))
            <div class="airplane">
                <img src="{{ asset($course_about->image_3) }}" alt="Airplane" />
            </div>
            @endif

            <div class="cloud">
                <svg viewBox="0 0 200 100" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="50" cy="50" rx="50" ry="30" fill="#ffffff" />
                    <ellipse cx="80" cy="40" rx="40" ry="25" fill="#ffffff" />
                    <ellipse cx="110" cy="50" rx="45" ry="28" fill="#ffffff" />
                </svg>
            </div>
        </div>
    </section>

    <!-- Training Modules Section -->
    <section class="training-section">
        <div class="container">

            {{-- Section Header (use first phase data) --}}
            @if($course_phases->count())
                <div class="section-header">
                    <span class="section-tag">Our Programs</span>
                    <h2 class="section-title">
                        {{ $course_phases->first()->heading }}
                    </h2>
                    <p class="section-description">
                        {{ $course_phases->first()->description }}
                    </p>
                    <div class="section-divider"></div>
                </div>
            @endif

            {{-- Course Phases --}}
            @foreach($course_phases as $index => $phase)
                <div class="training-module {{ $index % 2 == 1 ? 'reverse' : '' }}">
                    <div class="module-inner">

                        {{-- Module Number --}}
                        <div class="module-number-section">
                            <div class="module-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        {{-- Module Content --}}
                        <div class="module-content">

                            {{-- Icon --}}
                            <div class="module-icon">
                                <i class="fas {{ $phase->icon }}"></i>
                            </div>

                            {{-- Title --}}
                            <h3 class="module-title">
                                {{ $phase->title }}
                            </h3>

                            {{-- Description --}}
                            <p class="module-description">
                                {{ $phase->desc }}
                            </p>

                            {{-- FEATURES --}}
                            @if(!empty($phase->features))
                                <div class="feature-grid">
                                    @foreach($phase->features as $feature)
                                        <div class="feature-box">
                                            <i class="fas fa-atom"></i>
                                            <span>{{ $feature['text'] ?? '' }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            {{-- STATS --}}
                            @if(!empty($phase->stats))
                                <div class="module-stats">
                                    {{-- @foreach($phase->stats as $stat)
                                        <div class="stat-box">
                                            <div class="stat-icon">
                                                <i class="fas {{ $phase->stat_icon }}"></i>
                                            </div>
                                            <div class="stat-info">
                                                <span class="stat-number">
                                                    {{ $stat['number'] ?? '' }}
                                                </span>
                                                <span class="stat-label">
                                                    {{ $stat['label'] ?? '' }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach --}}
                                    @foreach($phase->stats as $stat)
                                        <div class="stat-box">
                                            <div class="stat-icon">
                                                <i class="fas {{ $stat['icon'] }}"></i>
                                            </div>
                                            <div class="stat-info">
                                                <span class="stat-number">{{ $stat['number'] }}</span>
                                                <span class="stat-label">{{ $stat['label'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <!-- Admission Section -->
    <section class="admission-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header text-center">
                <h2 class="display-5 text-uppercase">
                    Admission & Eligibility
                </h2>
                <p class="lead">Your gateway to a professional aviation career</p>
            </div>

            <!-- Eligibility & Assessment -->
            <div class="row">
                <!-- Eligibility Criteria -->
                <div class="col-lg-6 mb-4">
                    <div class="info-card">
                        <div class="card-header-custom">
                            <i class="fas fa-user-graduate"></i>
                            <span>Eligibility Criteria</span>
                        </div>

                        <ul class="eligibility-list">

                            @if($course_eligibility && is_array($course_eligibility->eligibilities))
                                @foreach($course_eligibility->eligibilities as $item)
                                    <li>
                                        <span>
                                            <strong>{{ $item['label'] ?? '' }}</strong>
                                            {{ $item['value'] ?? '' }}
                                        </span>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <span>No eligibility criteria available.</span>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>


                <!-- Selection Process -->
                {{-- @if($course_selection_process)
                    <div class="col-lg-6 mb-4">
                        <div class="info-card">
                            <div class="card-header-custom">
                                <i class="fas fa-tasks"></i>
                                <span>Assessment & Selection</span>
                            </div>

                            @if(!empty($course_selection_process->heading))
                                <p class="text-light mb-4">
                                    {{ $course_selection_process->heading }}
                                </p>
                            @endif

                            @foreach($course_selection_process->criteria as $index => $stage)
                                <div class="stage-item">
                                    <strong>Stage {{ $index + 1 }}: {{ $stage['title'] }}</strong>

                                    <p>{{ $stage['description'] }}</p>

                                    @if(!empty($stage['extra']))
                                        <div class="mb-3">
                                            <span class="fee-tag">{{ $stage['extra'] }}</span>
                                        </div>
                                    @endif
                                    <a href="#" class="btn-custom">Visit ADAPT Website</a>
                                </div>
                            @endforeach

                            @if($course_selection_process->note)
                                <div class="loi-notice">
                                    <i class="fas fa-certificate"></i>
                                    <strong>{{ $course_selection_process->note }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif --}}
                @if($course_selection_process->count())
                    @php
                        $firstProcess = $course_selection_process->first();
                        $stageNumber = 1;
                    @endphp

                    <div class="col-lg-6 mb-4">
                        <div class="info-card">

                            <div class="card-header-custom">
                                <i class="fas fa-tasks"></i>
                                <span>Assessment & Selection</span>
                            </div>

                            {{-- HEADING (show once) --}}
                            @if(!empty($firstProcess->heading))
                                <p class="text-light mb-4">
                                    {{ $firstProcess->heading }}
                                </p>
                            @endif

                            {{-- STAGES --}}
                            @foreach($course_selection_process as $process)

                                @php
                                    $criteria = $process->criteria ?? [];
                                    if (!is_array($criteria)) {
                                        $criteria = json_decode($criteria, true) ?? [];
                                    }
                                @endphp

                                @foreach($criteria as $stage)
                                    <div class="stage-item">
                                        <strong>
                                            Stage {{ $stageNumber++ }}:
                                            {{ $stage['title'] ?? '' }}
                                        </strong>

                                        <p>{{ $stage['description'] ?? '' }}</p>

                                        @if(!empty($stage['extra']))
                                            <div class="mb-3">
                                                <span class="fee-tag">{{ $stage['extra'] }}</span>
                                            </div>
                                        @endif

                                        {{-- <a href="#" class="btn-custom">Visit ADAPT Website</a> --}}
                                    </div>
                                @endforeach

                            @endforeach

                            {{-- NOTE (show once) --}}
                            @if(!empty($firstProcess->note))
                                <div class="loi-notice">
                                    <i class="fas fa-certificate"></i>
                                    <strong>{{ $firstProcess->note }}</strong>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif

            </div>

            <!-- Batch & Fee Information -->
            {{-- <div class="row mt-5">
                <div class="col-md-6 mb-4">
                    <div class="highlight-card">
                        <i class="{{ $infos->icon}}"></i>
                        <h4 class="text-uppercase">{{ $infos->title}}</h4>
                        <p>Contact us to learn more about our upcoming batches and registration process.</p>
                        <a href="{{ url('/contact-us') }}" class="btn-dark-custom">Contact Us</a>

                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="highlight-card">
                        <i class="fas fa-money-check-alt"></i>
                        <h4 class="text-uppercase">Fee Information</h4>
                        <p>Complete training program pricing</p>
                        <div class="price">₹94.10 Lakhs INR</div>
                        <a href="#" class="btn-dark-custom">Know More</a>
                    </div>
                </div>
            </div> --}}
            <div class="row mt-5">
                @forelse($infos as $info)
                    <div class="col-md-6 mb-4">
                        <div class="highlight-card">
                            <i class="{{ $info->icon }}"></i>

                            <h4 class="text-uppercase">
                                {{ $info->title }}
                            </h4>

                            <p>
                                {{ $info->description }}
                            </p>

                            {{-- Optional CTA --}}
                            {{-- <a href="{{ url('/contact-us') }}" class="btn-dark-custom">Contact Us</a> --}}
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        No information available
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Start Your Aviation Journey?</h2>
                <p class="cta-text">Join Vihanga Aviation Training and transform your dreams of flying into reality</p>
                <a href="#" class="cta-btn">Enroll Now</a>
            </div>
        </div>
    </section>
</div>
@endsection
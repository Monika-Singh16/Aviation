@extends('layout.master')

@section('css')
    <style>
        .service-wrapper {
            position: relative;
            height: 500px;
            border-radius: 10px;
        }

        .service-wrapper .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
            z-index: 1;
        }

        .service-wrapper .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2;
        }

        /* ---- Boxes ---- */
        .service-box {
            background-color: transparent;
            /* border: 1px solid rgba(255, 255, 255, 0.15); */
            transition: all 0.4s ease;
            position: relative;
            z-index: 3;
        }

        .service-box:hover {
            background-color: rgb(209, 175, 119);
            color: #fff !important;
        }

        .service-box:hover h5,
        .service-box:hover p {
            color: #fff !important;
        }

        .service-box.active {
            background-color: rgb(209, 175, 119);
            color: #fff;
        }

        .service-box.active:hover {
            background-color: transparent;
            color: #fff;
            border-color: rgba(255, 255, 255, 0.3);
        }

        h5 {
            color: #fff;
        }

        /* about page */
        .about-section {
            padding: 80px 0;
            background-color: #f9f9f9;
            position: relative;
        }

        @media only screen and (max-width: 991px) {
            .about-section {
                padding: 30px 0;
            }
        }

        .lead-text {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        /* ================================
            Image Section
            ================================ */
        .images-container {
            position: relative;
            height: 600px;
        }

        .img-wrapper {
            position: absolute;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img-main {
            top: 0;
            left: -20px;
            width: 70%;
            height: 65%;
            z-index: 2;
        }

        @media only screen and (max-width: 991px) {
            .img-main {
                left: 0px;
            }
        }

        .img-secondary {
            bottom: -22px;
            right: 0;
            width: 70%;
            height: 70%;
            z-index: 3;
        }

        .decorative-border {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            height: 55%;
            border: 3px solid #dcbb87;
            /* gold tone from your theme */
            border-radius: 20px;
            z-index: 0;
        }

        /* ================================
            Features Grid
            ================================ */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px 40px;
        }

        .about-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .about-icon {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #dcbb87;
            /* theme gold color */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .about-icon i {
            color: #fff;
            font-size: 13px;
        }

        .feature-text {
            font-size: 0.95rem;
            color: #333;
            font-weight: 500;
            line-height: 1.6;
        }

        .about-item:hover .about-icon {
            background: #1a1a1a;
            /* dark hover */
        }

        /* ================================
            Responsive
            ================================ */
        @media (max-width: 991px) {
            .images-container {
                height: 450px;
                margin-bottom: 40px;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            .lead-text {
                font-size: 0.95rem;
            }

            .images-container {
                height: 380px;
            }
        }

        /* Remove PL-5 on mobile */
        @media (max-width: 991px) {
            .pl-5 {
                padding-left: 15px !important;
            }
        }


        /* about section end */

        /* Facility Card Styles */
        .facilities-section {
            padding: 80px 0;
            background: #F1F4F8;
            position: relative;
            overflow: hidden;
        }

        .pattern-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                repeating-linear-gradient(45deg, transparent, transparent 50px, rgba(201, 169, 97, 0.02) 50px, rgba(201, 169, 97, 0.02) 100px);
            pointer-events: none;
        }

        /* Section Header */
        .section-header {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .sub-title {
            display: inline-block;
            font-size: 0.85rem;
            color: #c9a961;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 20px;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .section-description {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #6c757d;
            max-width: 650px;
            margin: 0 auto;
        }

        /* Facility Row */
        .facility-row {
            margin-bottom: 80px;
            position: relative;
        }

        .facility-row:last-child {
            margin-bottom: 0;
        }

        /* Image Column */
        .facility-image-col {
            padding: 0 30px;
        }

        .facility-image-wrapper {
            position: relative;
            border-radius: 0;
            overflow: hidden;
            box-shadow: 20px 20px 0 rgba(201, 169, 97, 0.15);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .facility-image-wrapper:hover {
            box-shadow: 30px 30px 0 rgba(201, 169, 97, 0.25);
            transform: translate(-5px, -5px);
        }

        .facility-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            display: block;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .facility-image-wrapper:hover .facility-img {
            transform: scale(1.1);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.6), transparent);
            display: flex;
            align-items: flex-start;
            padding: 30px;
        }

        .featured-facility {
            box-shadow: 20px 20px 0 rgba(201, 169, 97, 0.3);
        }

        .featured-tag {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: #fff;
            color: #c9a961;
            padding: 12px 30px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        /* Content Column */
        .facility-content-col {
            padding: 0 30px;
        }

        .facility-content {
            padding: 20px 0;
        }

        .facility-label {
            display: inline-block;
            background: #c9a961;
            color: #fff;
            padding: 8px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .premium-label {
            background: linear-gradient(135deg, #c9a961, #d4b76a);
        }

        .luxury-label {
            background: #1a1a1a;
            color: #c9a961;
        }

        .facility-title {
            font-size: 2rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 15px;
            letter-spacing: 1px;
            line-height: 1.1;
        }

        .title-underline {
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, #c9a961, transparent);
            margin-bottom: 25px;
        }

        .facility-text {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #6c757d;
            margin-bottom: 35px;
        }

        /* Specs Row */
        .facility-specs-row {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .spec-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .spec-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #c9a961, #d4b76a);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 0;
        }

        .spec-icon i {
            color: #fff;
            font-size: 1.5rem;
        }

        .spec-info h4 {
            font-size: 1.2rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 3px;
            line-height: 1;
        }

        .spec-info p {
            font-size: 0.8rem;
            color: #6c757d;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Bottom Section */
        .facility-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 30px;
            border-top: 3px solid #e9ecef;
        }

        .price-section {
            flex: 1;
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .section-title {
                font-size: 2.8rem;
            }

            .facility-title {
                font-size: 2.5rem;
            }

            .facility-img {
                height: 350px;
            }

            .facility-row {
                margin-bottom: 60px;
            }

            .facility-content-col {
                margin-top: 40px;
            }

            .facility-bottom {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .btn-facility-book {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .facilities-section {
                padding: 30px 0;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .section-header {
                margin-bottom: 12px;
            }

            .facility-title {
                font-size: 2rem;
            }

            .facility-img {
                height: 280px;
            }

            .facility-specs-row {
                flex-direction: column;
                gap: 20px;
            }

            .overlay-badge {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .price-value {
                font-size: 2.5rem;
            }

            .facility-image-wrapper {
                box-shadow: 15px 15px 0 rgba(201, 169, 97, 0.15);
            }
        }

        @media (max-width: 576px) {

            .facility-image-col,
            .facility-content-col {
                padding: 0 15px;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .facility-title {
                font-size: 1.75rem;
            }
        }

        /* gallery */
        .gallery-section {
            padding: 80px 0;
            background: #1a1a1a;
        }

        @media only screen and (max-width: 991px) {
            .gallery-section {
                padding: 40px 0;
            }
        }

        .section-label {
            color: #dcbb87;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
            text-align: center;
        }

        .gallery-title {
            color: #fff;
            font-size: 42px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Masonry Layout */
        .masonry-gallery {
            column-count: 3;
            column-gap: 20px;
        }

        @media (max-width: 992px) {
            .masonry-gallery {
                column-count: 2;
            }
        }

        @media (max-width: 576px) {
            .masonry-gallery {
                column-count: 1;
            }
        }

        .masonry-item {
            position: relative;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }

        .masonry-item img {
            width: 100%;
            display: block;
            border-radius: 8px;
            transition: transform 0.4s ease;
        }

        .masonry-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(220, 187, 135, 0.9);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .masonry-item:hover .gallery-overlay {
            opacity: 1;
        }

        .plus-icon {
            width: 60px;
            height: 60px;
            background: #212529;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .plus-icon::before,
        .plus-icon::after {
            content: '';
            position: absolute;
            background: #fff;
        }

        .plus-icon::before {
            width: 24px;
            height: 3px;
        }

        .plus-icon::after {
            width: 3px;
            height: 24px;
        }

        .plus-icon:hover {
            background: #fff;
        }

        .plus-icon:hover::before,
        .plus-icon:hover::after {
            background: #212529;
        }

        /* Popup */
        .image-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .image-popup img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        .close-popup {
            position: absolute;
            top: 40px;
            right: 60px;
            font-size: 36px;
            color: #fff;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .close-popup:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* gallery section */
        /* why section */
        .services-header {
            padding: 80px 0px;
            background: #19232d;
        }

        .services-subtitle {
            display: inline-flex;
            align-items: center;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: #a67c52;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .services-subtitle::after {
            content: '';
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, #a67c52, transparent);
            margin-left: 20px;
        }

        .services-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #a67c52;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .services-description {
            font-size: 1.05rem;
            color: #fff;
            line-height: 1.8;
            max-width: 600px;
        }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 35px;
            background: transparent;
            color: #333;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-size: 0.9rem;
        }

        .view-all-btn::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #a67c52;
            transition: width 0.3s;
        }

        .view-all-btn:hover::after {
            width: 100%;
        }

        .view-all-btn i {
            margin-left: 10px;
            transition: transform 0.3s;
        }

        .view-all-btn:hover i {
            transform: translateX(5px);
        }

        .flex-banner-section {
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .wdt-flex-banner-options {
            display: flex;
            height: 650px;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .wdt-flex-banner-option {
            flex: 1;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: flex 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            background-size: cover;
            background-position: center;
            border-right: 2px solid rgba(255, 255, 255, 0.1);
        }

        .wdt-flex-banner-option:last-child {
            border-right: none;
        }

        .wdt-flex-banner-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.6) 100%);
            transition: all 0.5s;
        }

        .wdt-flex-banner-option:hover::before {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%);
        }

        .wdt-flex-banner-option.active::before {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.55) 100%);
        }

        .wdt-flex-banner-option.active {
            flex: 2.5;
        }

        .wdt-flex-banner-label {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 0;
            z-index: 2;
        }

        .wdt-flex-banner-info {
            width: 100%;
            padding: 50px;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.5s ease 0.3s;
        }

        .wdt-flex-banner-option.active .wdt-flex-banner-info {
            transform: translateY(0);
            opacity: 1;
        }

        .wdt-flex-banner-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 4px;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(180deg);
            transition: all 0.6s ease;
            white-space: nowrap;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            z-index: 3;
        }

        .wdt-flex-banner-option.active .wdt-flex-banner-title {
            position: relative;
            writing-mode: horizontal-tb;
            transform: none;
            left: auto;
            top: auto;
            font-size: 30px;
            margin-bottom: 25px;
            letter-spacing: 3px;
        }

        @media (max-width: 768px) {
            .wdt-flex-banner-option.active .wdt-flex-banner-title {
                position: relative !important;
                writing-mode: horizontal-tb !important;
                transform: none !important;
                left: auto !important;
                top: auto !important;
                font-size: 20px !important;
                margin-bottom: 0 !important;
                letter-spacing: 1px !important;

                /* FIX FOR PADDING */
                display: block !important;
                width: 100% !important;
                padding-left: 0px !important;
                box-sizing: border-box !important;
            }
        }


        @media (max-width: 1280px) and (max-height: 720px) {
            .wdt-flex-banner-option.active .wdt-flex-banner-title {
                position: relative;
                writing-mode: horizontal-tb;
                transform: none;
                left: auto;
                top: auto;
                font-size: 1.5rem;
                /* fixed value, no negative */
                margin-bottom: 25px;
                letter-spacing: 3px;
            }
        }

        .wdt-flex-banner-content {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 30px;
            max-width: 500px;
        }

        .wdt-flex-banner-content h2 {
            color: #fff;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: 700;
        }

        .wdt-flex-banner-button {
            display: inline-block;
        }

        .wdt-flex-banner-button a {
            display: inline-block;
            padding: 14px 40px;
            background: #a67c52;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(166, 124, 82, 0.3);
        }

        .wdt-flex-banner-button a::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .wdt-flex-banner-button a:hover::before {
            width: 300px;
            height: 300px;
        }

        .wdt-flex-banner-button a:hover {
            background: #8b6543;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(166, 124, 82, 0.5);
        }

        /* Hide content in collapsed state */
        .wdt-flex-banner-option:not(.active) .wdt-flex-banner-content,
        .wdt-flex-banner-option:not(.active) .wdt-flex-banner-button {
            display: none;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .services-title {
                font-size: 2.2rem;
            }

            .wdt-flex-banner-options {
                height: 500px;
            }

            .wdt-flex-banner-option.active .wdt-flex-banner-title {
                font-size: 1.5rem;
            }

            .wdt-flex-banner-info {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .services-header {
                padding: 50px 0 30px;
            }

            .services-title {
                font-size: 1.8rem;
            }

            .wdt-flex-banner-options {
                flex-direction: column;
                height: auto;
            }

            .wdt-flex-banner-option {
                flex: 1;
                min-height: 300px;
            }

            .wdt-flex-banner-option::before {
                background-image: linear-gradient(180deg, #05336700, #000000 100%);
            }

            .wdt-flex-banner-option.active {
                flex: 1;
                min-height: 400px;
            }

            .wdt-flex-banner-title {
                writing-mode: horizontal-tb;
                transform: none;
                position: relative;
                left: 0;
                top: 0;
                font-size: 1.2rem;
                padding: 20px;
            }

            .wdt-flex-banner-option.active .wdt-flex-banner-title {
                font-size: 1.5rem;
            }

            .wdt-flex-banner-info {
                padding: 20px;
            }

            .wdt-flex-banner-content {
                font-size: 0.9rem;
            }
        }

        /* Animation on load */
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

        .services-header>* {
            animation: fadeInUp 0.8s ease-out both;
        }

        .services-subtitle {
            animation-delay: 0.1s;
        }

        .services-title {
            animation-delay: 0.2s;
        }

        .services-description {
            animation-delay: 0.3s;
        }

        .view-all-btn {
            animation-delay: 0.4s;
        }

        /* ===== Minimal CSS patch — add at the end of your CSS ===== */

        /* Ensure hover visuals are applied even if media queries override :hover */
        .wdt-flex-banner-option:hover,
        .wdt-flex-banner-option.hover,
        .wdt-flex-banner-option.active {
            /* copy the exact visual rules you expect on hover/active */
            transform: scale(1.03) !important;
            filter: brightness(1.05) !important;
        }

        /* If you rely on the ::before gradient change on hover, include it too */
        .wdt-flex-banner-option:hover::before,
        .wdt-flex-banner-option.hover::before,
        .wdt-flex-banner-option.active::before {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.55) 100%) !important;
        }

        /* Make sure nothing blocks pointer events on the options */
        .wdt-flex-banner-option {
            pointer-events: auto !important;
            z-index: 10;
        }

        .wdt-flex-banner::before,
        .wdt-flex-banner::after {
            pointer-events: none !important;
        }

        /* why us end */

        /* Carrer  section css */
        .aviation-section {
            padding: 80px 0;
            background: #FFFFFF;
            position: relative;
        }

        .career-title {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 30px;
            color: #2c2c2c;
        }

        .feature-box {
            background: #c9e7eb66;
            border-radius: 30px;
            padding: 50px 40px 50px 120px;
            margin-bottom: 40px;
            position: relative;
            transition: all 0.4s ease;
            border: 2px solid transparent;
            backdrop-filter: blur(10px);
        }

        .feature-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 30px;
            padding: 2px;
            background: linear-gradient(135deg, #c9a961, #d4b76a);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .feature-box:hover::before {
            opacity: 1;
            animation: rotateBorder 3s linear infinite;
        }

        @keyframes rotateBorder {
            0% {
                background: linear-gradient(0deg, #c9a961, #d4b76a);
            }

            25% {
                background: linear-gradient(90deg, #c9a961, #d4b76a);
            }

            50% {
                background: linear-gradient(180deg, #c9a961, #d4b76a);
            }

            75% {
                background: linear-gradient(270deg, #c9a961, #d4b76a);
            }

            100% {
                background: linear-gradient(360deg, #c9a961, #d4b76a);
            }
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(201, 169, 97, 0.25);
        }

        .feature-number {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #c9a961, #d4b76a);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(201, 169, 97, 0.4);
            position: absolute;
            left: 30px;
            top: 50%;
            transform: translateY(-50%);
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #0a1628;
            margin-bottom: 15px;
        }

        .feature-description {
            font-size: 0.9rem;
            color: #5a6c7d;
            line-height: 1.6;
            margin: 0;
        }

        .aircraft-image-container {
            position: relative;
            text-align: right;
            margin-bottom: 50px;
        }

        .aircraft-image-container img {
            max-width: 100%;
            height: auto;
            position: relative;
            z-index: 10;
        }

        .left-col {
            padding-right: 30px;
        }

        .right-col {
            padding-left: 30px;
        }

        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #ff6b35;
            color: #fff;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        @media (max-width: 991px) {

            .left-col,
            .right-col {
                padding-left: 15px;
                padding-right: 15px;
            }

            .aircraft-image-container {
                text-align: center;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            .section-title {
                font-size: 2rem;
                margin-bottom: 50px;
            }

            .feature-box {
                padding: 40px 30px 40px 100px;
            }
        }

        @media (max-width: 768px) {
            .aviation-section {
                padding: 30px 0;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .feature-box {
                padding: 35px 25px;
                text-align: center;
            }

            .feature-number {
                position: static;
                transform: none;
                margin: 0 auto 20px;
            }

            .feature-title {
                font-size: 1.25rem;
            }
        }

        /* Carrer  section css end*/
    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Banner
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="banner-section">
            <div class="banner-element" data-aos="fade-left" data-aos-duration="1200">
                <img src="{{ asset('assets/images/element/element-1.png') }}" alt="element">
            </div>
            <div class="banner-element-two">
                <img src="{{ asset('assets/images/element/element-3.png') }}" alt="element">
            </div>
            <div class="banner-element-three">
                <img src="{{ asset('assets/images/element/element-4.png') }}" alt="element">
            </div>
            <div class="banner-element-four">
                <img src="{{ asset('assets/images/element/element-5.png') }}" alt="element">
            </div>
            <div class="banner-social-area">
                <ul class="banner-social">
                    <li><a href="https://www.facebook.com/vihangaaviationacademy"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://x.com/VihangaAviation" class="active"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://youtube.com/@vihangaaviationacademy?si=j9TQRTPobf3XdqEU"><i
                                class="fab fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/vihangaaviationacademy/"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center mb-30-none">
                    <div class="col-xxl-5 col-xl-6 col-lg-12 mb-30">
                        <div class="banner-content" data-aos="fade-right" data-aos-duration="1800">
                            <span class="sub-title">{{ $hero->sub_title }}</span>
                            <h1 class="title">{{ $hero->title }}</h1>
                            <p>{{ $hero->description }}</p>
                            <div class="banner-btn">
                                <a href="{{ url('/') }}" class="btn--base"><i class="fas fa-chevron-right mr-2"></i>
                                    Explore </a>
                                <a href="{{ url('/contact-us') }}" class="btn--base active">Request Information <i
                                        class="icon-Group-2361 ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6 col-lg-6 mb-30" style= "height:200px;">
                        <div class="banner-thumb">
                            <img src="{{ asset( $hero->image ) }}" alt="element">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                About section
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column - Images -->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="images-container">
                            <div class="img-wrapper img-main">
                                <img src="{{ asset($about->image) }}" class="img-fluid" alt="About Image" />
                            </div>
                            <div class="img-wrapper img-secondary">
                                <img src="{{ asset($about->image_one) }}" alt="Aviation Professionals" />
                            </div>
                            <div class="decorative-border"></div>
                        </div>
                    </div>

                    <!-- Right Column - Content -->
                    <div class="col-lg-6 pl-5">
                        <div class="section-header section-header--style">
                            <span class="sub-title"> {{ $about->title }}
                                <span class="right-icon"><i class="icon-Benefits-of-Training"></i></span>
                            </span>
                            <h2 class="section-title text-left"> {{ $about->sub_title }}</h2>
                            <p class="lead-text">
                                {{ $about->description_1 }}
                            </p>
                        </div>
                        <!-- Features Grid -->
                        <div class="features-grid">
                            @foreach (is_array($about->features) ? $about->features : json_decode($about->features, true) as $feature)
                                <div class="about-item">
                                    <div class="about-icon"><i class="fa fa-check"></i></div>
                                    <span class="feature-text">{{ trim($feature) }}</span>
                                </div>
                            @endforeach

                            <a href="{{ url('about') }}" class="btn--base">
                                View More<i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                Why Section
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="services-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 mb-4 mb-md-0">
                        <div class="services-subtitle">Why VAA?</div>
                        <h2 class="services-title">The Preferred Choice for Aviation Training</h2>
                        <p class="services-description">
                            Vihanga Aviation Academy (VAA) offers world-class training with an advanced learning
                            environment,
                            modern aircraft, and expert instructors dedicated to helping aspiring pilots achieve their
                            aviation goals.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex-banner-section">
            <div class="wdt-flex-banner-options">
                <!-- Option 1 -->
                <div class="wdt-flex-banner-option"
                    style="background-image: url('{{ asset('assets/images/aviation/gallery_aviation/gallery2.jpg') }}'); ">
                    <div class="wdt-flex-banner-label">
                        <div class="wdt-flex-banner-info">
                            <div class="wdt-flex-banner-title">Strategically Located</div>
                            <div class="wdt-flex-banner-content">
                                <h2>Strategically Located</h2>
                                <p>
                                    VAA is situated in a location that offers excellent weather conditions, ample flying
                                    hours,
                                    and an airspace perfect for continuous training. The academy provides a professional
                                    flying environment
                                    that supports efficient learning and growth.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Option 2 - Active -->
                <div class="wdt-flex-banner-option active"
                    style="background-image: url('{{ asset('assets/images/aviation/gallery_aviation/gallery3.png') }}');">
                    <div class="wdt-flex-banner-label">
                        <div class="wdt-flex-banner-info">
                            <div class="wdt-flex-banner-title">Modern Training Fleet</div>
                            <div class="wdt-flex-banner-content">
                                <h2>Advanced & Reliable Aircraft</h2>
                                <p>
                                    VAA operates a well-maintained fleet equipped with the latest avionics to ensure safe
                                    and effective training.
                                    Students learn on modern cockpit systems that prepare them for next-level commercial
                                    aviation environments.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Option 3 -->
                <div class="wdt-flex-banner-option"
                    style="background-image: url('{{ asset('assets/images/aviation/gallery_aviation/gallery2.jpg') }}');">
                    <div class="wdt-flex-banner-label">
                        <div class="wdt-flex-banner-info">
                            <div class="wdt-flex-banner-title">Professional Pilot Training</div>
                            <div class="wdt-flex-banner-content">
                                <h2>Become a Confident & Skilled Pilot</h2>
                                <p>
                                    VAA provides structured training programs designed for future commercial pilots.
                                    With expert instructors and an industry-oriented curriculum, cadets develop the skills
                                    required to progress confidently into airline training pathways.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Option 4 -->
                <div class="wdt-flex-banner-option"
                    style="background-image: url('{{ asset('assets/images/aviation/gallery_aviation/gallery3.png') }}');">
                    <div class="wdt-flex-banner-label">
                        <div class="wdt-flex-banner-info">
                            <div class="wdt-flex-banner-title">Safety Equipped</div>
                            <div class="wdt-flex-banner-content">
                                <h2>Safety & Training Excellence</h2>
                                <p>
                                    Safety is the highest priority at VAA. The academy follows strict regulatory standards,
                                    comprehensive safety procedures, and continuous monitoring to ensure a secure and
                                    disciplined
                                    training environment for all cadets.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
              courses  section
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <section class="course-section ptb-80">
            <div class="container">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-header-wrapper">
                            <div class="section-header section-header--style">
                                <span class="sub-title">Choose Course
                                    <span class="right-icon"><i class="icon-Benefits-of-Training"></i></span>
                                </span>
                                <h2 class="section-title text-left">Find The Right Aviation Course For You</h2>
                            </div>
                            <div class="section-header-btn-area">
                                <a href="{{ url('/') }}" class="btn--base">View All Course
                                    <i class="icon-Group-2361 ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-10-none">
                    <div class="col-xl-12">
                        <div class="course-slider-wrapper">
                            <div class="course-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($course_detail as $item)
                                        <div class="swiper-slide">
                                            <div class="course-item">
                                                <div class="course-thumb">
                                                    <img src="{{ asset($item->image) }}" alt="course">
                                                </div>
                                                <div class="course-content">
                                                    <div class="course-content-header">
                                                        <h3 class="title">
                                                            <a href="{{ url('/courses') }}">
                                                                {{ $item->course_name }}
                                                            </a>
                                                        </h3>
                                                        <span class="time"><i class="las la-clock"></i> 45 Hours</span>
                                                    </div>
                                                    <div class="course-content-body">
                                                        <p>{{ $item->description }}</p>
                                                    </div>
                                                    <div class="course-content-footer">
                                                        <a href="{{ url('/courses') }}" class="btn--base">
                                                            Enroll Now
                                                            <i class="icon-Group-2361 ml-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
               CTA section
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="about-section bg-overlay-base ptb-80 bg_img" data-background="{{ asset($cta->image) }}">
            {{-- <div class="about-element">
                <img src="{{asset($cta->image)}}" alt="element">
            </div> --}}
            <div class="container">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xl-7 col-lg-7 mb-30">
                        <div class="about-content">
                            <span class="sub-title">{{ $cta->sub_title }}</span>
                            <h2 class="title">{{ $cta->title }}</h2>
                            <p>{{ $cta->description }}</p>
                            <div class="about-book-area">
                                <div class="about-book-element">
                                    <img src="{{ asset('assets/images/element/element-7.png') }}" alt="element">
                                </div>
                                <div class="about-book-left mb-2">
                                    <h3 class="call-title">Call for Admission Assistance</h3>
                                    <span class="call"><a href="tel:+91-98765-43210">+91-98765-43210</a></span>
                                </div>
                                <div class="about-book-right">
                                    <a href="{{ url('/contact') }}" class="btn--base"><i class="icon-btn-icon-v2"></i>
                                        Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 mb-30">
                        <div class="about-thumb-video">
                            <!--<div class="video-main">-->
                            <!--    <div class="promo-video">-->
                            <!--        <div class="waves-block">-->
                            <!--            <div class="waves wave-1"></div>-->
                            <!--            <div class="waves wave-2"></div>-->
                            <!--            <div class="waves wave-3"></div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <a class="video-icon" data-rel="lightcase:myCollection"-->
                            <!--        href="https://www.youtube.com/embed/Hw4ctvV25H0">-->
                            <!--        <i class="fas fa-play"></i>-->
                            <!--    </a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
               Facility section
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="facilities-section">
            <div class="container">
                <!-- Section Header -->
                <div class="section-header text-center">
                    <span class="sub-title">
                        <span class="left-icon"><i class="icon-title-icon"></i></span> Our Facilities
                        <span class="right-icon" data-aos="fade-right" data-aos-duration="1200">
                            <i class="icon-Benefits-of-Training"></i>
                        </span>
                    </span>
                    <h2 class="section-title">Luxury Aircraft Built for Your Comfort</h2>
                    <p class="section-description">Experience the pinnacle of private aviation with our meticulously
                        maintained fleet</p>
                </div>

                <!-- Light Jets - Left Aligned -->
                @foreach ($facility as $key => $facility)
                    <div class="facility-row row align-items-center">
                        @if ($key % 2 == 0)
                            {{-- EVEN INDEX → IMAGE LEFT + TEXT RIGHT --}}
                            <div class="col-lg-6 facility-image-col" data-aos="fade-right">
                                <div class="facility-image-wrapper">
                                    <img src="{{ asset('admin-assets/facility-page/' . $facility->image) }}"
                                        alt="Light Jets" class="facility-img">
                                </div>
                            </div>

                            <div class="col-lg-6 facility-content-col" data-aos="fade-left">
                                <div class="facility-content">

                                    <span class="facility-label">Popular Choice</span>

                                    <h3 class="facility-title">{{ $facility->heading }}</h3>

                                    <div class="title-underline"></div>

                                    <p class="facility-text">{{ $facility->short_description }}</p>

                                    <div class="facility-specs-row">
                                        <div class="spec-item">
                                            <div class="spec-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="spec-info">
                                                <h4>13 Passengers</h4>
                                                <p>Comfortable Seating</p>
                                            </div>
                                        </div>
                                        <div class="spec-item">
                                            <div class="spec-icon">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                            <div class="spec-info">
                                                <h4>7-8 Hours</h4>
                                                <p>Flight Range</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="facility-bottom">
                                        <a href="{{ url('/facility') }}" class="btn--base">
                                            Book Your Flight <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @else
                            {{-- ODD INDEX → TEXT LEFT + IMAGE RIGHT --}}
                            <div class="col-lg-6 facility-content-col" data-aos="fade-right">
                                <div class="facility-content">

                                    <span class="facility-label">Popular Choice</span>

                                    <h3 class="facility-title">{{ $facility->heading }}</h3>

                                    <div class="title-underline"></div>

                                    <p class="facility-text">{{ $facility->short_description }}</p>

                                    <div class="facility-specs-row">
                                        <div class="spec-item">
                                            <div class="spec-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="spec-info">
                                                <h4>13 Passengers</h4>
                                                <p>Comfortable Seating</p>
                                            </div>
                                        </div>
                                        <div class="spec-item">
                                            <div class="spec-icon">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                            <div class="spec-info">
                                                <h4>7-8 Hours</h4>
                                                <p>Flight Range</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="facility-bottom">
                                        <a href="{{ url('/facility') }}" class="btn--base">
                                            Book Your Flight <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 facility-image-col" data-aos="fade-left">
                                <div class="facility-image-wrapper">
                                    <img src="{{ asset('admin-assets/facility-page/' . $facility->image) }}"
                                        alt="Light Jets" class="facility-img">
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

            <!-- Background Pattern -->
            <div class="pattern-bg"></div>
        </section>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                Career Section Start
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section class="aviation-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 left-col">
                        <div class="section-label text-left">Career as a Pilot</div>
                        <h2 class="career-title text-left">{{ $career_pilot->title }}</h2>
                        <p class="feature-description mb-2">
                            {{ $career_pilot->description }}
                        </p>
                    </div>

                    <div class="col-lg-6 right-col">
                        <!-- Aircraft Image -->
                        <div class="aircraft-image-container">
                            <img src="{{ asset($career_pilot->image) }}" alt="Commercial Aircraft" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($career_pilots as $key=>$row)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="feature-box">
                                <div class="feature-number">0{{$key + 1}}</div>
                                <h3 class="feature-title">{{ $row->card_title }}</h3>
                                <p class="feature-description">
                                    {{ $row->card_description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
              Gallery Section Start
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section class="gallery-section">
            <div class="container">
                <div class="section-label">OUR GALLERY</div>
                <h2 class="gallery-title">Explore Our Aviation Training Moments</h2>

                <div class="masonry-gallery">

                    @forelse($galleries as $gallery)
                        <div class="masonry-item">
                            <img src="{{ asset($gallery->images) }}" alt="Gallery Image" />
                            <div class="gallery-overlay">
                                <div class="plus-icon"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No gallery images available.</p>
                    @endforelse

                </div>

                <div class="section-header-btn-area text-center pt-4">
                    <a href="{{ url('/gallery') }}" class="btn--base">
                        View All Gallery <i class="icon-Group-2361 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Popup Modal -->
            <div id="imagePopup" class="image-popup" style="display: none;">
                <span class="close-popup">&times;</span>
                <img src="" alt="Popup Image">
            </div>
        </section>


        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
             Faq Section Start
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section class="faq-section ptb-80">
            <div class="container">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xl-6 col-lg-7 mb-30 aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="1200">
                        <div class="faq-header-area">
                            <span class="sub-title">FAQ</span>
                            <h2 class="title">{{ $faq->heading }}</h2>
                            <p>{{ $faq->description }}</p>
                            {{-- <ul class="faq-service-list">
                                <li><i class="las la-star"></i> Expert Trainers</li>
                                <li><i class="las la-star"></i> Affordable Fees</li>
                                <li><i class="las la-star"></i> Placement</li>
                            </ul> --}}
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
                        <div class="faq-thumb aos-init aos-animate" data-aos="fade-left" data-aos-duration="1200">
                            <img src="{{ asset( $faq->image ) }}" alt="faq">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
              Contact Section Start
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section class="contact-section ptb-80 bg--gray">
            <div class="container">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xl-6 col-lg-6 mb-30">
                        <div class="map-area">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.1899657893728!2d90.42380431666383!3d23.779746865573756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7499f257eab%3A0xe6b4b9eacea70f4a!2sManama+Tower!5e0!3m2!1sen!2sbd!4v1561542597668!5m2!1sen!2sbd"
                                style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 mb-30">
                        <div class="contact-form-inner aos-init aos-animate" data-aos="fade-left"
                            data-aos-duration="1200">
                            <div class="contact-left-content aos-init aos-animate" data-aos="fade-right"
                                data-aos-duration="1200">
                                <span class="sub-title">Get in Touch</span>
                                <h2 class="title">AHave Questions? We’re Here to Help</h2>
                                <p class="mb-2">
                                    Ready to begin your aviation journey? Contact us today and let our team guide you to new
                                    heights.
                                </p>
                            </div>
                            <div class="contact-form-area">
                                <form class="contact-form">
                                    <div class="row justify-content-center mb-20-none">
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label class="icon"><i class="icon-name_icone"></i></label>
                                            <input type="text" class="form--control" name="name"
                                                placeholder="Name" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label class="icon"><i class="las la-envelope"></i></label>
                                            <input type="email" class="form--control" name="email"
                                                placeholder="Email" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label class="icon"><i class="icon-call_icone"></i></label>
                                            <input type="number" class="form--control" name="phone"
                                                placeholder="Phone" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <div class="contact-select">
                                                <div class="nice-select form--control" tabindex="0">
                                                    <span class="current">Subject</span>
                                                    <ul class="list">
                                                        <li data-value="1" class="option selected">Flight Training</li>
                                                        <li data-value="2" class="option">Admission Inquirye</li>
                                                        <li data-value="3" class="option">Career Guidance</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <label class="icon"><i class="icon-massage"></i></label>
                                            <textarea class="form--control" placeholder="Message" required=""></textarea>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <button type="submit" class="btn--base mt-10">Submit Now <i
                                                    class="icon-Group-2361 ml-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const plusIcons = document.querySelectorAll('.plus-icon');
            const popup = document.getElementById('imagePopup');
            const popupImage = popup.querySelector('img');
            const closeBtn = popup.querySelector('.close-popup');

            plusIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const img = this.closest('.masonry-item').querySelector('img');
                    popupImage.src = img.src;
                    popup.style.display = 'flex';
                });
            });

            closeBtn.addEventListener('click', () => popup.style.display = 'none');
            popup.addEventListener('click', e => {
                if (e.target === popup) popup.style.display = 'none';
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const options = document.querySelectorAll('.wdt-flex-banner-option');

            function activateOption() {
                options.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            }

            function deactivateOption() {
                this.classList.remove('active');
            }

            options.forEach(option => {
                option.addEventListener('click', activateOption);
                option.addEventListener('mouseenter', activateOption);
                option.addEventListener('pointerenter', activateOption); // ✅ For touch + all screens
                option.addEventListener('mouseleave', deactivateOption); // ✅ Now works on hover out
                option.addEventListener('pointerleave', deactivateOption);
            });

            // Auto rotate functionality (optional)
            let currentIndex = 0;
            const autoRotate = false; // Set to true to enable auto-rotation

            if (autoRotate) {
                setInterval(() => {
                    options.forEach(opt => opt.classList.remove('active'));
                    currentIndex = (currentIndex + 1) % options.length;
                    options[currentIndex].classList.add('active');
                }, 5000);
            }
        });
    </script>
    <script>
        /* ===== Minimal JS patch — add after your existing script ===== */
        document.addEventListener('DOMContentLoaded', () => {
            const opts = document.querySelectorAll('.wdt-flex-banner-option');
            if (!opts.length) return;

            opts.forEach(o => {
                // use pointer events (works for mouse, stylus, touch)
                o.addEventListener('pointerenter', () => o.classList.add('hover'));
                o.addEventListener('pointerleave', () => o.classList.remove('hover'));
                // keep existing click behavior intact (no changes)
            });
        });
    </script>
@endsection

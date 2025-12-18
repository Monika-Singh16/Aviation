@extends('layout.master')
@section('content')

    <div class="page-wrapper">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Banner
         ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="banner-section inner-banner-section bg-overlay-black bg_img"
            data-background="{{asset('assets/images/aviation/course_page/courses_detail/inner-bg.png')}}">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 text-center">
                        <div class="banner-content">
                            <h1 class="title">Course  Detail</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Course  Detail</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Package
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="package-section package--style package-details ptb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="package-item">
                        <div class="package-thumb">
                            <img src="{{asset('assets/images/aviation/course_page/courses_detail/course-details.png')}}" alt="package">
                        </div>
                        <div class="package-widget-area">
                            <div class="row justify-content-center mb-50-none">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-20">
                                    <div class="package-widget-item">
                                        <div class="package-widget-icon">
                                            <i class="icon-Duration"></i>
                                        </div>
                                        <div class="package-widget-content">
                                            <h4 class="title">Course Duration</h4>
                                            <span class="sub-title">1 Year</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-20">
                                    <div class="package-widget-item">
                                        <div class="package-widget-icon">
                                            <i class="icon-Start_From_icone"></i>
                                        </div>
                                        <div class="package-widget-content">
                                            <h4 class="title">Start Date</h4>
                                            <span class="sub-title">Thursday, Nov 4, 2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-20">
                                    <div class="package-widget-item">
                                        <div class="package-widget-icon">
                                            <i class="icon-Level_iconE"></i>
                                        </div>
                                        <div class="package-widget-content">
                                            <h4 class="title">Course Level</h4>
                                            <span class="sub-title">Beginner</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-20">
                                    <div class="package-widget-item">
                                        <div class="package-widget-icon">
                                            <i class="icon-Fees_icone"></i>
                                        </div>
                                        <div class="package-widget-content">
                                            <h4 class="title">Fees / Semester</h4>
                                            <span class="sub-title">₹45,000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="package-content-area pt-120">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xl-8 col-lg-8 mb-30">
                        <div class="package-content">
                            <div class="package-content-header">
                                <h3 class="title">About Commercial Pilot License (CPL) Course</h3>
                                <p>The Commercial Pilot License (CPL) program at <strong>Vihanga Aviation Training</strong> is designed to help aspiring pilots build the knowledge, skills, and flight experience needed to become professional aviators. This course provides both theoretical training and extensive flying hours under the guidance of certified instructors, ensuring students are well-prepared for a career in commercial aviation.</p>
                            </div>

                            <div class="package-content-body">
                                <h3 class="title">Career Opportunities</h3>
                                <ul class="package-list">
                                    <li>Become a certified commercial pilot eligible to fly charter and airline aircraft.</li>
                                    <li>Opportunities in domestic and international airlines.</li>
                                    <li>Can be customized based on the student’s professional goals.</li>
                                    <li>Comprehensive flight and simulator training included.</li>
                                    <li>Assistance with license conversion and placement support.</li>
                                </ul>
                            </div>

                            <p>At Vihanga Aviation, students receive world-class training, practical flying experience, and the right professional guidance to start their aviation journey confidently.</p>

                            <div class="course-table-area table-responsive">
                                <h3 class="title">Study Options</h3>
                                <table class="custom-table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Qualification</th>
                                            <th>Duration</th>
                                            <th>Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Qualification">Commercial Pilot License <span class="text--base">(CPL)</span></td>
                                            <td data-label="Length">9 Months (Full Time)</td>
                                            <td data-label="Code"><span class="text--dark font-weight-bold">cpl01</span></td>
                                        </tr>
                                        <tr>
                                            <td data-label="Qualification">Bachelor of Aviation <span class="text--base">(B.Sc)</span></td>
                                            <td data-label="Length">1 Year (Full Time)</td>
                                            <td data-label="Code"><span class="text--dark font-weight-bold">ba02</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="package-content-header mt-30">
                                <h3 class="title">Professional Experience</h3>
                                <p>During the CPL training at Vihanga Aviation, students gain real-time exposure to aircraft handling, air traffic operations, and flight management systems. Our expert instructors ensure every trainee develops strong technical, operational, and decision-making skills necessary to succeed in the aviation industry.</p>
                            </div>

                            <div class="course-download-area">
                                <div class="download-content">
                                    <div class="download-icon"><i class="las la-file-pdf"></i></div>
                                    <h3 class="title">Download Full Course Module</h3>
                                </div>
                                <div class="download-btn">
                                    <a href="#0" class="btn--base">Download <i class="icon-Group-2361 ml-2"></i></a>
                                </div>
                            </div>

                            <div class="package-review-area">
                                <h3 class="title">Reviews</h3>
                                <div class="package-review-wrapper">
                                    <div class="row justify-content-center mb-20-none">
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 mb-20">
                                            <div class="package-ratings-area">
                                                <span class="sub-title">Average Rating</span>
                                                <div class="package-ratings-widget">
                                                    <span class="num">5</span>
                                                    <div class="ratings">
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                    </div>
                                                    <span class="credit">6 Ratings</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-8 mb-20">
                                            <div class="package-ratings-area">
                                                <div class="ratings-form-wrapper">
                                                    <div class="ratings-form-text text-right">
                                                        <span class="sub-title"><i class="las la-pen"></i> Write a Review</span>
                                                    </div>
                                                </div>
                                                <div class="package-ratings-widget">
                                                    <div class="package-rating-bar-area">
                                                        <div class="package-ratings-bar">
                                                            <span class="ratings-bar-content"><i class="las la-star"></i> 5</span>
                                                            <div class="progressbar" data-perc="100%">
                                                                <div class="bar"></div>
                                                            </div>
                                                            <span class="label">5 Ratings</span>
                                                        </div>
                                                        <div class="package-ratings-bar">
                                                            <span class="ratings-bar-content"><i class="las la-star"></i> 4</span>
                                                            <div class="progressbar" data-perc="10%">
                                                                <div class="bar"></div>
                                                            </div>
                                                            <span class="label">1 Rating</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="ratings-form">
                                    <div class="form-group rating">
                                        <input type="radio" id="star1" name="rating" value="5" /><label for="star1">&nbsp;</label>
                                        <input type="radio" id="star2" name="rating" value="4" /><label for="star2">&nbsp;</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3">&nbsp;</label>
                                        <input type="radio" id="star4" name="rating" value="2" /><label for="star4">&nbsp;</label>
                                        <input type="radio" id="star5" name="rating" value="1" /><label for="star5">&nbsp;</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form--control" placeholder="Write your review" rows="8" name="comment" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn--base mt-20">Comment Now <i class="icon-Group-2361 ml-2"></i></button>
                                    </div>
                                </form>

                                <div class="package-comment-wrapper">
                                    <div class="package-comment-item">
                                        <div class="package-comment-thumb">
                                            <img src="{{asset('assets/images/aviation/course_page/courses_detail/author-1.png')}}" alt="author">
                                        </div>
                                        <div class="package-comment-content">
                                            <div class="package-comment-content-header">
                                                <h4 class="title">Rahul Mehta</h4>
                                                <div class="comment-ratings">
                                                    <i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                                                </div>
                                                <span class="comment-badge">Excellent Training</span>
                                            </div>
                                            <p>Vihanga Aviation provides excellent flight training facilities and experienced instructors. I gained both confidence and technical skills during my CPL training.</p>
                                        </div>
                                    </div>

                                    <div class="package-comment-item">
                                        <div class="package-comment-thumb">
                                            <img src="{{asset('assets/images/aviation/course_page/courses_detail/author-1.png')}}" alt="author">
                                        </div>
                                        <div class="package-comment-content">
                                            <div class="package-comment-content-header">
                                                <h4 class="title">Priya Sharma</h4>
                                                <div class="comment-ratings">
                                                    <i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                                                </div>
                                                <span class="comment-badge">Great Experience</span>
                                            </div>
                                            <p>It was an amazing learning experience at Vihanga Aviation. The instructors were very supportive, and the flying sessions were professionally managed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 mb-30">
                        <div class="sidebar">
                            <div class="widget-box mb-30 bg-overlay-black bg_img" data-background="{{asset('assets/images/aviation/course_page/courses_detail/book.png')}}">
                                <h4 class="widget-title text-white">Book This Course</h4>
                                <div class="package-book-widget-box">
                                    <form class="package-book-form mb-20-none">
                                        <div class="form-group">
                                            <label class="icon"><i class="icon-name_icone"></i></label>
                                            <input type="text" class="form--control" name="name" placeholder="Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="icon"><i class="las la-envelope"></i></label>
                                            <input type="email" class="form--control" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="icon"><i class="icon-call_icone"></i></label>
                                            <input type="number" class="form--control" name="phone" placeholder="Phone Number" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn--base"><i class="icon-btn-icon-v2"></i> Book Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="widget-box mb-30">
                                <h4 class="widget-title">More Courses</h4>
                                <div class="popular-widget-box">
                                    <div class="single-popular-item d-flex flex-wrap align-items-center">
                                        <div class="popular-item-thumb">
                                            <img src="{{asset('assets/images/aviation/course_page/courses_detail/small-blog-1.png')}}" alt="blog">
                                        </div>
                                        <div class="popular-item-content">
                                            <span class="blog-date">Aug 23, 2021</span>
                                            <h5 class="title"><a href="{{url('/courses-details')}}">Private Pilot License (PPL)</a></h5>
                                        </div>
                                    </div>
                                    <div class="single-popular-item d-flex flex-wrap align-items-center">
                                        <div class="popular-item-thumb">
                                            <img src="{{asset('assets/images/aviation/course_page/courses_detail/small-blog-1.png')}}" alt="blog">
                                        </div>
                                        <div class="popular-item-content">
                                            <span class="blog-date">Aug 23, 2021</span>
                                            <h5 class="title"><a href="{{url('/courses-details')}}">Multi-Engine IFR Rating</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-box">
                                <h4 class="widget-title">Course Instructor</h4>
                                <div class="instructor-widget-box">
                                    <div class="instructor-header-area">
                                        <div class="instructor-thumb">
                                            <img src="{{asset('assets/images/aviation/course_page/courses_detail/small-blog-1.png')}}" alt="instructor">
                                        </div>
                                        <div class="instructor-content">
                                            <h5 class="title"><a href="team-details.html">Capt. Alex Hundy</a></h5>
                                            <span class="sub-title">Chief Flight Instructor</span>
                                            <div class="instructor-ratings">
                                                <span class="text--base">5.0 <i class="las la-star"></i></span>
                                                <span>Instruction Rating</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="instructor-body-area">
                                        <p>Capt. Alex has over 10 years of experience in commercial aviation and flight training. His expertise ensures students receive practical, high-quality instruction aligned with industry standards.</p>
                                    </div>
                                    <div class="instructor-footer-area">
                                        <ul class="instructor-social">
                                            <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#0" class="active"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#0"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

       
    </div>
@endsection
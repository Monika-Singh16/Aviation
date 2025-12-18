@extends('layout.master')
@section('css')
<style>
  /* ------------------------------
    ADMISSION PAGE LIGHT THEME
  --------------------------------*/

  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
  }

  @keyframes slideInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
  }

  .admission-section {
    padding: 100px 0;
    background: #f9f9f9; /* Very light background */
    position: relative;
    overflow: hidden;
  }

  .section-heading {
    text-align: center;
    margin-bottom: 80px;
    animation: fadeInUp 1s ease-out;
  }

  .section-heading .subtitle {
    color: #d3a84f;
    font-weight: 700;
    letter-spacing: 4px;
    text-transform: uppercase;
    font-size: 14px;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
  }

  .section-heading .subtitle::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: #d3a84f;
  }

  .section-heading .title {
    font-size: 48px;
    font-weight: 800;
    color: #222; /* darker text */
    margin-top: 20px;
    letter-spacing: 1px;
  }

  .section-heading p {
    color: #555;
    font-size: 17px;
    max-width: 700px;
    margin: 20px auto 0;
    line-height: 1.8;
  }

  .highlight-card {
    background: #fff;
    border-radius: 20px;
    padding: 45px 30px;
    text-align: center;
    border: 1px solid #eee;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
  }

  .highlight-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
  }

  .highlight-card .icon-wrapper {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: #d3a84f;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 15px rgba(211,168,79,0.3);
  }

  .highlight-card i {
    font-size: 36px;
    color: #fff;
  }

  .highlight-card h5 {
    font-weight: 700;
    margin-bottom: 12px;
    color: #222;
    font-size: 20px;
  }

  .highlight-card p {
    color: #555;
    font-size: 15px;
    line-height: 1.6;
  }

  .eligibility-box {
    background: #fff;
    padding: 45px 40px;
    border-radius: 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    border: 1px solid #eee;
    animation: slideInLeft 1s ease-out;
  }

  .eligibility-box h4 {
    font-weight: 700;
    margin-bottom: 20px;
    color: #d3a84f;
    font-size: 24px;
    border-bottom: 2px solid #d3a84f;
    display: inline-block;
    padding-bottom: 6px;
  }

  .eligibility-box ul {
    list-style: none;
    padding-left: 0;
  }

  .eligibility-box ul li {
    margin-bottom: 14px;
    font-size: 16px;
    color: #333;
    position: relative;
    padding-left: 28px;
  }

  .eligibility-box ul li::before {
    content: "✈";
    color: #d3a84f;
    position: absolute;
    left: 0;
    top: 0;
  }

  .admission-form {
    background: #fff;
    border-radius: 20px;
    padding: 45px;
    border: 1px solid #eee;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    animation: slideInRight 1s ease-out;
  }

  .admission-form h3 {
    font-weight: 800;
    font-size: 30px;
    margin-bottom: 30px;
    text-align: center;
    color: #222;
    position: relative;
  }

  .admission-form h3::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: #d3a84f;
  }

  .form-control, .form-select {
    border-radius: 10px;
    border: 1px solid #ccc;
    background: #fff;
    color: #333;
    padding: 14px 16px;
    font-size: 15px;
    transition: all 0.3s ease;
  }

  .form-control::placeholder {
    color: #999;
  }

  .form-control:focus, .form-select:focus {
    border-color: #d3a84f;
    box-shadow: 0 0 10px rgba(211,168,79,0.2);
  }

  .btn-gold {
    background: #d3a84f;
    color: #fff;
    font-weight: 700;
    padding: 14px 45px;
    border-radius: 10px;
    border: none;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .btn-gold:hover {
    background: #c2993e;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(211,168,79,0.3);
  }

  @media (max-width: 768px) {
    .section-heading .title { font-size: 34px; }
    .admission-form, .eligibility-box { padding: 30px; }
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
                            <h1 class="title">Admissions</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Admissions</li>
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

<!-- Admission Section -->
<section class="admission-section">
  <div class="container">

    <div class="section-heading">
      <span class="subtitle">Enroll Today</span>
      <h2 class="title">Begin Your Aviation Career</h2>
      <p class="mt-3">
        Apply now to join our aviation academy and take your first flight toward a successful future in the skies.
      </p>
    </div>

    <!-- Highlights -->
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="highlight-card">
          <div class="icon-wrapper">
            <i class="bi bi-airplane-engines"></i>
          </div>
          <h5>Advanced Flight Simulators</h5>
          <p>Experience realistic flight sessions with world-class simulators and expert instructors.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="highlight-card">
          <div class="icon-wrapper">
            <i class="bi bi-award"></i>
          </div>
          <h5>Certified Programs</h5>
          <p>Our training meets global aviation standards and is recognized by leading aviation bodies.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="highlight-card">
          <div class="icon-wrapper">
            <i class="bi bi-people"></i>
          </div>
          <h5>100% Placement Support</h5>
          <p>We guide every student from training to top career placements in reputed airlines.</p>
        </div>
      </div>
    </div>

    <!-- Two Column Layout -->
    <div class="row g-5 align-items-start">
      <div class="col-lg-6">
        <div class="eligibility-box">
          <h4>Eligibility Criteria</h4>
          <ul>
            <li>Minimum 10+2 with Physics & Mathematics</li>
            <li>Age: 17 years or above</li>
            <li>Medical Fitness Certificate from DGCA approved doctor</li>
            <li>Good communication skills in English</li>
          </ul>

          <h4 class="mt-5">Documents Required</h4>
          <ul>
            <li>10th & 12th Marksheets</li>
            <li>Passport-size Photographs</li>
            <li>ID Proof (Aadhar / Passport)</li>
            <li>Medical Fitness Certificate</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="admission-form">
          <h3>Admission Form</h3>
          <form>
            <div class="row g-3">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" placeholder="Full Name" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="email" class="form-control" placeholder="Email Address" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" placeholder="Phone Number" required>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" id="course" name="course" required>
                  <option selected disabled>-- Select Course --</option>
                  <option value="Pilot Training">Pilot Training</option>
                  <option value="Cabin Crew Training">Cabin Crew Training</option>
                  <option value="Ground Staff Program">Ground Staff Program</option>
                  <option value="Aircraft Maintenance">Aircraft Maintenance</option>
                </select>
              </div>
              <div class="col-12">
                <textarea class="form-control" rows="4" placeholder="Your Message (optional)"></textarea>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-gold">Submit Application</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
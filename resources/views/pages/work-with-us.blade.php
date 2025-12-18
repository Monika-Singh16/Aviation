@extends('layout.master')
@section('css')
<style>
    :root {
        --gold: #dcbb87;
        --gold-dark: #c9a66b;
        --gold-light: #f0e0c8;
        --dark: #2c2c2c;
        --light-bg: #f8f9fa;
    }
    
    /* Main Content Wrapper */
    .career-wrapper {
        background: #ffffff;
        padding: 80px 0px;
    }
    @media (max-width: 576px) {
        .career-wrapper {
            padding: 30px 0;
        }
    }
    /* Filter Section */
    .filter-section {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .filter-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--gold);
    }
    .filter-group {
        margin-bottom: 20px;
    }
    .filter-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
        font-size: 0.95rem;
    }
    .form--control {
        width: 100%;
        border: 1px solid #d5b98b;
        border-radius: 5px;
        background-color: #fff;
        padding: 10px 15px;
        font-size: 15px;
        color: #333;
        transition: all 0.3s ease;
    }
    select.form--control {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml;utf8,<svg fill='%23d5b98b' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
        cursor: pointer;
        color: #666;
        margin-bottom:10px !important;
    }
    select.form--control option {
        color: #333;
    }
    select.form--control option:first-child {
        color: #666;
    }
   
    .nice-select .current {
        line-height: normal;
        display: flex;
        align-items: center;
        color: rgba(61, 61, 61, 0.7) !important;
    }
  
    .form--control:focus {
        border-color: #bfa15a;
        box-shadow: 0 0 5px rgba(191, 161, 90, 0.3);
        outline: none;
    }
    .form--control::placeholder {
        color: #666;
    }
    .btn-filter {
        background: var(--gold);
        color: white;
        border: none;
        padding: 10px 28px;
        border-radius: 6px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-filter:hover {
        background: var(--gold-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 187, 135, 0.3);
    }
    .btn-reset {
        background: transparent;
        color: var(--gold-dark);
        border: 2px solid var(--gold);
        padding: 10px 30px;
        border-radius: 6px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    .btn-reset:hover {
        background: var(--gold-light);
    }
    
    /* Jobs Results Section */
    .jobs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e0e0e0;
    }
    .jobs-count {
        font-size: 1.1rem;
        color: #666;
    }
    .jobs-count strong {
        color: var(--dark);
        font-size: 1.3rem;
    }
    .sort-dropdown {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sort-dropdown label {
        font-weight: 600;
        color: #555;
        margin: 0;
    }
    .sort-dropdown select {
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 8px 15px;
        font-size: 0.9rem;
        cursor: pointer;
    }
    
    /* Job Card */
    .job-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .job-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 5px;
        height: 100%;
        background: var(--gold);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }
    .job-card:hover::before {
        transform: scaleY(1);
    }
    .job-card:hover {
        box-shadow: 0 5px 20px rgba(220, 187, 135, 0.2);
        border-color: var(--gold);
        transform: translateX(5px);
    }
    .job-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 15px;
        gap: 20px;
    }
    .job-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
        line-height: 1.3;
    }
    .job-title:hover {
        color: var(--gold-dark);
        cursor: pointer;
    }
    .job-id {
        font-size: 0.85rem;
        color: #888;
        margin-bottom: 8px;
    }
    .job-posted {
        font-size: 0.85rem;
        color: #666;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .job-posted i {
        color: var(--gold);
    }
    .apply-btn {
        background: var(--gold);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .apply-btn:hover {
        background: var(--gold-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 187, 135, 0.4);
    }
    .job-details {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 15px;
    }
    .job-detail-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
        color: #555;
    }
    .job-detail-item i {
        color: var(--gold);
        font-size: 1rem;
    }
    .job-detail-item strong {
        font-weight: 600;
        color: var(--dark);
    }
    .job-description {
        color: #666;
        line-height: 1.7;
        margin-bottom: 15px;
    }
    .job-requirements {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }
    .requirements-title {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
        font-size: 1rem;
    }
    .requirements-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .requirement-tag {
        background: var(--gold-light);
        color: var(--gold-dark);
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }
    .pagination {
        display: flex;
        gap: 5px;
    }
    .page-item .page-link {
        border: 1px solid #ddd;
        color: var(--dark);
        padding: 10px 16px;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .page-item.active .page-link {
        background: var(--gold);
        border-color: var(--gold);
        color: white;
    }
    .page-item .page-link:hover {
        background: var(--gold-light);
        border-color: var(--gold);
        color: var(--dark);
    }
    
    /* No Results */
    .no-results {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border: 2px dashed #ddd;
        border-radius: 8px;
    }
    .no-results i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }
    .no-results h4 {
        color: var(--dark);
        margin-bottom: 10px;
    }
    .no-results p {
        color: #666;
    }
    
    /* Info Banner */
    .info-banner {
        background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
        color: white;
        padding: 40px;
        border-radius: 8px;
        margin-bottom: 30px;
        text-align: center;
    }
    .info-banner h3 {
        font-weight: 700;
        margin-bottom: 15px;
    }
    .info-banner p {
        font-size: 1.1rem;
        opacity: 0.95;
        margin-bottom: 0;
    }
    
    /* Sticky Sidebar */
    @media (min-width: 992px) {
        .sticky-sidebar {
            position: sticky;
            top: 100px;
        }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .job-header {
            flex-direction: column;
        }
        .apply-btn {
            width: 100%;
        }
        .jobs-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            padding-left: 30px;
        }
        .sort-dropdown {
            width: 100%;
        }
        .sort-dropdown select {
            flex: 1;
        }
    }
</style>
@endsection

@section('content')
    <!-- Career Page Content -->
    <section class="banner-section inner-banner-section bg-overlay-black bg_img"
        data-background="{{asset('assets/images/aviation/home_page/bgimg/inner-bg.png')}}">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 text-center">
                    <div class="banner-content">
                        <h1 class="title">Work With Us</h1>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Work With Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="career-wrapper">
        <div class="container">
            <!-- Info Banner -->
            <div class="info-banner">
                <h3>Join Our Growing Team of Aviation Professionals</h3>
                <p>Explore exciting career opportunities at Vihaga Aviation Academy</p>
            </div>

            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-lg-4">
                    <div class="sticky-sidebar">
                       <div class="filter-section">
                            <h4 class="filter-title">Filter Jobs</h4>

                            <div class="filter-group ">
                                <label class="filter-label">Keywords</label>
                                <input type="text" id="keyword" class="form--control" placeholder="Search by title, skills...">
                            </div>

                            <div class="filter-group ">
                                <label class="filter-label">Location</label>
                                <select id="location" class="form--control mb-2">
                                    <option value="" selected>Select Location</option>
                                    <option value="lucknow">Lucknow</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="mumbai">Mumbai</option>
                                    <option value="bangalore">Bangalore</option>
                                </select>
                            </div>

                            <div class="filter-group ">
                                <label class="filter-label">Department</label>
                                <select id="department" class="form--control mb-2">
                                    <option value="" selected>Select Department</option>
                                    <option value="flight">Flight Training</option>
                                    <option value="maintenance">Aircraft Maintenance</option>
                                    <option value="ground">Ground School</option>
                                    <option value="admin">Administration</option>
                                    <option value="counseling">Counseling</option>
                                </select>
                            </div>

                            <div class="filter-group ">
                                <label class="filter-label">Job Type</label>
                                <select id="job_type" class="form--control mb-2">
                                    <option value="" selected>Select Job Type</option>
                                    <option value="fulltime">Full-Time</option>
                                    <option value="parttime">Part-Time</option>
                                    <option value="contract">Contract</option>
                                </select>
                            </div>

                            <div class="filter-group ">
                                <label class="filter-label">Experience Level</label>
                                <select id="experience" class="form--control mb-2">
                                    <option value="" selected>Select Experience</option>
                                    <option value="entry">Entry Level (0-2 years)</option>
                                    <option value="mid">Mid Level (2-5 years)</option>
                                    <option value="senior">Senior Level (5+ years)</option>
                                </select>
                            </div>

                            <button class="btn btn-filter" id="filterBtn">
                                <i class="fa fa-search mr-2"></i> Search Jobs
                            </button>

                            <button class="btn btn-reset" id="resetBtn">
                                <i class="fa fa-redo mr-2"></i> Reset Filters
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Jobs Listing -->
                <div class="col-lg-8 pl-lg-5 pl-0">
                    <!-- Jobs Header -->
                    <div class="jobs-header">
                        <div class="jobs-count">
                            Showing <strong>24</strong> job openings
                        </div>
                        <div class="sort-dropdown">
                            <label>Sort by:</label>
                            <select>
                                <option>Latest First</option>
                                <option>Oldest First</option>
                                <option>A to Z</option>
                                <option>Z to A</option>
                            </select>
                        </div>
                    </div>

                    <!-- Job Cards -->
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Senior Flight Instructor (CPL/ATPL)</h3>
                                <div class="job-id">Job ID: VA-FI-2024-001</div>
                                <div class="job-posted">
                                    <i class="fa fa-clock"></i>
                                    <span>Posted 2 days ago</span>
                                </div>
                            </div>
                            <button class="apply-btn">
                                Apply Now <i class="fa fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                        
                        <div class="job-details">
                            <div class="job-detail-item">
                                <i class="fa fa-map-marker-alt"></i>
                                <span><strong>Location:</strong> Lucknow, Uttar Pradesh</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-briefcase"></i>
                                <span><strong>Experience:</strong> 5+ Years</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-clock"></i>
                                <span><strong>Type:</strong> Full-Time</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-users"></i>
                                <span><strong>Vacancies:</strong> 3 Positions</span>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            We are seeking experienced flight instructors to join our training team. The ideal candidate will have a strong aviation background with CPL/ATPL certification and a passion for teaching. You will be responsible for conducting flight training sessions, mentoring students, and ensuring compliance with DGCA regulations.
                        </div>
                        
                        <div class="job-requirements">
                            <div class="requirements-title">Key Requirements:</div>
                            <div class="requirements-list">
                                <span class="requirement-tag">CPL/ATPL License</span>
                                <span class="requirement-tag">5+ Years Experience</span>
                                <span class="requirement-tag">Flight Instructor Rating</span>
                                <span class="requirement-tag">DGCA Certified</span>
                                <span class="requirement-tag">Communication Skills</span>
                            </div>
                        </div>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Aircraft Maintenance Engineer (AME)</h3>
                                <div class="job-id">Job ID: VA-AME-2024-002</div>
                                <div class="job-posted">
                                    <i class="fa fa-clock"></i>
                                    <span>Posted 5 days ago</span>
                                </div>
                            </div>
                            <button class="apply-btn">
                                Apply Now <i class="fa fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                        
                        <div class="job-details">
                            <div class="job-detail-item">
                                <i class="fa fa-map-marker-alt"></i>
                                <span><strong>Location:</strong> Lucknow, Uttar Pradesh</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-briefcase"></i>
                                <span><strong>Experience:</strong> 3-5 Years</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-clock"></i>
                                <span><strong>Type:</strong> Full-Time</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-users"></i>
                                <span><strong>Vacancies:</strong> 2 Positions</span>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            Join our aircraft maintenance training department as an instructor. You will teach students about aircraft systems, maintenance procedures, troubleshooting techniques, and ensure they meet DGCA AME license requirements. Hands-on technical expertise required.
                        </div>
                        
                        <div class="job-requirements">
                            <div class="requirements-title">Key Requirements:</div>
                            <div class="requirements-list">
                                <span class="requirement-tag">AME License</span>
                                <span class="requirement-tag">Category B1/B2</span>
                                <span class="requirement-tag">Teaching Experience</span>
                                <span class="requirement-tag">Technical Expertise</span>
                                <span class="requirement-tag">DGCA Approved</span>
                            </div>
                        </div>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Ground School Instructor - Meteorology</h3>
                                <div class="job-id">Job ID: VA-GS-2024-003</div>
                                <div class="job-posted">
                                    <i class="fa fa-clock"></i>
                                    <span>Posted 1 week ago</span>
                                </div>
                            </div>
                            <button class="apply-btn">
                                Apply Now <i class="fa fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                        
                        <div class="job-details">
                            <div class="job-detail-item">
                                <i class="fa fa-map-marker-alt"></i>
                                <span><strong>Location:</strong> Lucknow, Uttar Pradesh</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-briefcase"></i>
                                <span><strong>Experience:</strong> 2-4 Years</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-clock"></i>
                                <span><strong>Type:</strong> Full-Time</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-users"></i>
                                <span><strong>Vacancies:</strong> 1 Position</span>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            We're looking for a knowledgeable meteorology instructor to teach aspiring pilots about weather patterns, atmospheric conditions, and their impact on aviation. Strong theoretical knowledge and ability to simplify complex concepts required.
                        </div>
                        
                        <div class="job-requirements">
                            <div class="requirements-title">Key Requirements:</div>
                            <div class="requirements-list">
                                <span class="requirement-tag">Meteorology Degree</span>
                                <span class="requirement-tag">Aviation Background</span>
                                <span class="requirement-tag">Teaching Skills</span>
                                <span class="requirement-tag">Presentation Skills</span>
                                <span class="requirement-tag">DGCA Syllabus Knowledge</span>
                            </div>
                        </div>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Aviation Career Counselor</h3>
                                <div class="job-id">Job ID: VA-CC-2024-004</div>
                                <div class="job-posted">
                                    <i class="fa fa-clock"></i>
                                    <span>Posted 1 week ago</span>
                                </div>
                            </div>
                            <button class="apply-btn">
                                Apply Now <i class="fa fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                        
                        <div class="job-details">
                            <div class="job-detail-item">
                                <i class="fa fa-map-marker-alt"></i>
                                <span><strong>Location:</strong> Lucknow, Uttar Pradesh</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-briefcase"></i>
                                <span><strong>Experience:</strong> 1-3 Years</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-clock"></i>
                                <span><strong>Type:</strong> Full-Time</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-users"></i>
                                <span><strong>Vacancies:</strong> 2 Positions</span>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            Guide prospective students through their aviation career journey. Provide information about various courses, career paths, admission procedures, and help students make informed decisions about their aviation future.
                        </div>
                        
                        <div class="job-requirements">
                            <div class="requirements-title">Key Requirements:</div>
                            <div class="requirements-list">
                                <span class="requirement-tag">Counseling Experience</span>
                                <span class="requirement-tag">Aviation Knowledge</span>
                                <span class="requirement-tag">Communication Skills</span>
                                <span class="requirement-tag">Student Relations</span>
                                <span class="requirement-tag">Sales Aptitude</span>
                            </div>
                        </div>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Flight Operations Manager</h3>
                                <div class="job-id">Job ID: VA-FOM-2024-005</div>
                                <div class="job-posted">
                                    <i class="fa fa-clock"></i>
                                    <span>Posted 2 weeks ago</span>
                                </div>
                            </div>
                            <button class="apply-btn">
                                Apply Now <i class="fa fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                        
                        <div class="job-details">
                            <div class="job-detail-item">
                                <i class="fa fa-map-marker-alt"></i>
                                <span><strong>Location:</strong> Lucknow, Uttar Pradesh</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-briefcase"></i>
                                <span><strong>Experience:</strong> 8+ Years</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-clock"></i>
                                <span><strong>Type:</strong> Full-Time</span>
                            </div>
                            <div class="job-detail-item">
                                <i class="fa fa-users"></i>
                                <span><strong>Vacancies:</strong> 1 Position</span>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            Oversee all flight training operations, manage flight schedules, ensure safety compliance, coordinate with instructors and students, maintain aircraft readiness, and ensure smooth daily operations of the flight training department.
                        </div>
                        
                        <div class="job-requirements">
                            <div class="requirements-title">Key Requirements:</div>
                            <div class="requirements-list">
                                <span class="requirement-tag">CPL License</span>
                                <span class="requirement-tag">Management Experience</span>
                                <span class="requirement-tag">Operations Knowledge</span>
                                <span class="requirement-tag">Leadership Skills</span>
                                <span class="requirement-tag">Safety Management</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
<script>
document.getElementById("filterBtn").addEventListener("click", function () {
    let keyword = document.getElementById("keyword").value.toLowerCase();
    let location = document.getElementById("location").value.toLowerCase();
    let department = document.getElementById("department").value.toLowerCase();
    let job_type = document.getElementById("job_type").value.toLowerCase();
    let experience = document.getElementById("experience").value.toLowerCase();

    let jobs = document.querySelectorAll(".job-card");

    jobs.forEach(job => {
        let text = job.innerText.toLowerCase();

        let match =
            (!keyword || text.includes(keyword)) &&
            (!location || text.includes(location)) &&
            (!department || text.includes(department)) &&
            (!job_type || text.includes(job_type)) &&
            (!experience || text.includes(experience));

        job.style.display = match ? "block" : "none";
    });
});

document.getElementById("resetBtn").addEventListener("click", function () {
    document.getElementById("keyword").value = "";
    document.getElementById("location").value = "";
    document.getElementById("department").value = "";
    document.getElementById("job_type").value = "";
    document.getElementById("experience").value = "";

    let jobs = document.querySelectorAll(".job-card");
    jobs.forEach(job => (job.style.display = "block"));
});
</script>

@endsection
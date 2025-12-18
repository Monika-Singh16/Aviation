@extends('layout.master')

@section('css')
<style>
/* Match select box style to input fields */
.form--control {
    width: 100%;
    border: 1px solid #d5b98b;
    border-radius: 5px;
    background-color: #fff;
    padding: 10px 15px;
    font-size: 15px;
    color: #333;
    transition: all 0.3s ease;
    font-family: sans-serif;
    font-weight: 400;
}

/* Ensure selects look identical */
select.form--control {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;utf8,<svg fill='%23d5b98b' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 16px;
    cursor: pointer;
}

/* Hover & Focus effect */
.form--control:focus {
    border-color: #bfa15a;
    box-shadow: 0 0 5px rgba(191, 161, 90, 0.3);
    outline: none;
}

/* Optional placeholder text color */
.form--control::placeholder {
    color: #666;
}

/* To align labels properly */
label.fw-bold {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: 500;
    font-family: sans-serif;
    font-size: 13px;
}

/* ✅ Fix for Nice Select text visibility on Enquiry page */
.contact-section .nice-select .current {
    color: #666 !important; /* visible dark gray text */
    font-weight: 600
    font-family: sans-serif;
    font-size: 15px;
}

/* ✅ Keep dropdown consistent with gold theme */
.contact-section .nice-select {
    border: 1px solid #dcbb87 !important;
    border-radius: 5px;
    height: 50px;
    line-height: 30px;
    padding: 10px 15px;
}

/* ✅ Optional: gold arrow */
.contact-section .nice-select:after {
    border-bottom: 2px solid #dcbb87;
    border-right: 2px solid #dcbb87;
}
.nice-select .option {
    cursor: pointer;
    font-weight: 500;
    line-height: 40px;
    list-style: none;
    min-height: 40px;
    outline: none;
    color: #666;
    padding-left: 18px;
    padding-right: 29px;
    text-align: left;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    font-size: 14px;
}

</style>
@endsection

@section('content')
<section class="banner-section inner-banner-section bg-overlay-black bg_img"
    data-background="{{asset('assets/images/aviation/home_page/bgimg/inner-bg.png')}}">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-12 text-center">
                <div class="banner-content">
                    <h1 class="title">Enquire Now</h1>
                    <div class="breadcrumb-area">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Enquiry</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CAPTCHA Verification Section -->
<section class="otp-section ptb-80" id="captchaSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-3 text-center p-4">
                    <img src="{{asset('assets/images/aviation/enquiry/otp.svg')}}" alt="OTP" class="mx-auto mb-3"
                        style="width:80px;">
                    <h4 class="fw-semibold mb-3">Captcha Verification</h4>

                    <form id="captchaForm">
                        <div class="mb-3">
                            <input type="email" id="email" class="form--control" placeholder="Enter your Email" required>
                        </div>

                        <!-- Custom CAPTCHA -->
                        <div class="mb-3">
                            <input type="text" id="captchaInput" class="form--control"
                                placeholder="Enter the characters shown below" required>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <canvas id="captchaCanvas" width="200" height="50"
                                    style="border: 1px solid #ddd; border-radius:5px;"></canvas>
                                <i class="las la-sync fs-4 text-secondary" style="cursor:pointer;"
                                    id="refreshCaptcha"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn--base w-100 mt-3">Verify Captcha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OTP Verification Section (Hidden Initially) -->
<section class="otp-section ptb-80" id="otpSection" style="display:none;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-3 text-center p-4">
                    <img src="{{asset('assets/images/aviation/enquiry/otp.svg')}}" alt="OTP" class="mx-auto mb-3"
                        style="width:80px;">
                    <h4 class="fw-semibold mb-3">OTP Verification</h4>

                    <form id="otpForm">
                        <div class="mb-3">
                            <input type="text" id="otpInput" class="form--control" placeholder="Enter OTP" required>
                        </div>
                        <button type="submit" class="btn--base w-100 mt-3">Submit OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hidden Enquiry Form -->
<section class="contact-section ptb-80" id="enquiryFormSection" style="display: none;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <form class="contact-form shadow p-4 rounded bg-white">

                    <h4 class="text-center mb-4 fw-semibold">Submit Your Enquiry</h4>

                    <div class="row justify-content-center mb-20-none">

                        <!-- Desired Course -->
                        <div class="col-xl-12 col-lg-12 form-group">
                            <label class="fw-bold">Desired Course *</label>
                            <select class="form--control" name="desired_course" required>
                                <option value="">-Select-</option>
                                <option>CPL (Commercial Pilot Licence)</option>
                                <option>PPL (Private Pilot Licence)</option>
                                <option>ATPL Ground Classes</option>
                                <option>Integrated “Zero to Airline” Programme</option>
                                <option>Cabin Crew</option> 
                                <option>Others</option>
                            </select>
                        </div>

                        <!-- Student Name -->
                        <div class="col-xl-12 col-lg-12 form-group">
                            <label class="fw-bold">Student’s Name *</label>
                            <div class="d-flex">
                                <input type="text" class="form--control mr-2" name="first_name" placeholder="First" required>
                                <input type="text" class="form--control" name="last_name" placeholder="Last" required>
                            </div>
                            <small class="text-muted">Name as per Class 10th Marks Sheet</small>
                        </div>

                        <!-- Gender -->
                        <div class="col-xl-12 col-lg-12 form-group">
                            <label class="fw-bold">Gender *</label>
                            <select class="form--control" name="gender" required>
                                <option value="">-Select-</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <!-- Height -->
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Height (cm) *</label>
                            <input type="number" class="form--control" name="height" placeholder="Enter your height in cm" required>
                        </div>

                        <!-- Weight -->
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Weight (kg) *</label>
                            <input type="number" class="form--control" name="weight" placeholder="Enter your weight in kg" required>
                        </div>

                        <!-- Email -->
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Email Address *</label>
                            <input type="email" class="form--control" name="email" placeholder="Enter email" required>
                        </div>

                        <!-- Mobile -->
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Mobile Number *</label>
                            <input type="tel" class="form--control" name="mobile" placeholder=" Enter your mobile number" pattern="[0-9]{10}" required>
                        </div>

                        <!-- Alternate Contact -->
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Alternate Contact Number</label>
                            <input type="tel" class="form--control" name="alternate_mobile" placeholder="Enter your alternate mobile number" pattern="[0-9]{10}">
                        </div>
                         <!-- DOB -->
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Date of Birth *</label>
                            <input type="date" class="form--control" name="dob" required>
                        </div>

                         <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold"> Nationality*</label>
                            <select class="form--control" name="desired_course" required>
                                <option value="">-Select-</option>
                                <option>Indian Passport Holder</option>
                                <option>Foreign Passport Holder</option>
                                <option>Dual Citizenship Holder</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold"> DGCA Medical Status*</label>
                            <select class="form--control" name="desired_course" required>
                                <option value="">-Select-</option>
                                <option>Class 2 From CA-35 Available</option>
                                <option>Class 2 Medical Assessment Available</option>
                                <option>Class 1 From CA-35 Available</option>
                                <option>Class 1 Medical Assessment Available</option>
                                <option>Not Applied</option>
                                <option>Will Apply</option>
                            </select>
                        </div>
                         <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Eductational Status</label>
                            <select class="form--control" name="desired_course" required>
                                <option value="">-Select-</option>
                                <option>Pursuing Class 10th</option>
                                <option>Pursuing Class 11th</option>
                                <option>Pursuing Class 12th</option>
                                <option>Appeard for 12th Boards</option>
                                <option>Passed Class 12th</option>
                                <option>Graduate</option>
                                <option>Pursuing Graduation</option>
                                <option>Diploma Holder</option>  
                                <option>Pursuing Diploma</option> 
                                <option>Post Graduate</option>  
                                <option>Pursuing Post Graduation</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">Physics and Math in class 12th*</label>
                            <select class="form--control" name="desired_course" required>
                                <option value="">-Select-</option>
                                <option>Yes</option>
                                <option>No</option>
                                <option>Through NIOS</option>
                            </select>
                        </div>
                       <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">City</label>
                            <select class="form--control" name="city" required>
                                <option value="">-Select City-</option>
                                <option>Agra</option>
                                <option>Ahmedabad</option>
                                <option>Aizawl</option>
                                <option>Ajmer</option>
                                <option>Aligarh</option>
                                <option>Amritsar</option>
                                <option>Asansol</option>
                                <option>Aurangabad</option>
                                <option>Bangalore</option>
                                <option>Bareilly</option>
                                <option>Bhopal</option>
                                <option>Bhubaneswar</option>
                                <option>Bilaspur</option>
                                <option>Chandigarh</option>
                                <option>Chennai</option>
                                <option>Coimbatore</option>
                                <option>Cuttack</option>
                                <option>Dehradun</option>
                                <option>Delhi</option>
                                <option>Dhanbad</option>
                                <option>Durgapur</option>
                                <option>Ernakulam</option>
                                <option>Faridabad</option>
                                <option>Gandhinagar</option>
                                <option>Ghaziabad</option>
                                <option>Goa</option>
                                <option>Gorakhpur</option>
                                <option>Guntur</option>
                                <option>Guwahati</option>
                                <option>Gwalior</option>
                                <option>Hisar</option>
                                <option>Hubballi</option>
                                <option>Hyderabad</option>
                                <option>Imphal</option>
                                <option>Indore</option>
                                <option>Itanagar</option>
                                <option>Jabalpur</option>
                                <option>Jaipur</option>
                                <option>Jalandhar</option>
                                <option>Jammu</option>
                                <option>Jamshedpur</option>
                                <option>Jhansi</option>
                                <option>Jodhpur</option>
                                <option>Kanpur</option>
                                <option>Kochi</option>
                                <option>Kohima</option>
                                <option>Kolkata</option>
                                <option>Kota</option>
                                <option>Kozhikode</option>
                                <option>Lucknow</option>
                                <option>Ludhiana</option>
                                <option>Madurai</option>
                                <option>Mangalore</option>
                                <option>Meerut</option>
                                <option>Moradabad</option>
                                <option>Mumbai</option>
                                <option>Mysuru</option>
                                <option>Nagpur</option>
                                <option>Nashik</option>
                                <option>Panaji</option>
                                <option>Patna</option>
                                <option>Puducherry</option>
                                <option>Pune</option>
                                <option>Raipur</option>
                                <option>Rajkot</option>
                                <option>Ranchi</option>
                                <option>Rourkela</option>
                                <option>Salem</option>
                                <option>Shillong</option>
                                <option>Shimla</option>
                                <option>Siliguri</option>
                                <option>Srinagar</option>
                                <option>Surat</option>
                                <option>Thane</option>
                                <option>Thiruvananthapuram</option>
                                <option>Tiruchirappalli</option>
                                <option>Tirupati</option>
                                <option>Udaipur</option>
                                <option>Vadodara</option>
                                <option>Varanasi</option>
                                <option>Vijayawada</option>
                                <option>Visakhapatnam</option>
                                <option>Warangal</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="col-xl-6 col-lg-6 form-group">
                            <label class="fw-bold">State</label>
                            <select class="form--control" name="state" required>
                                <option value="">-Select State-</option>
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chhattisgarh</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Haryana</option>
                                <option>Himachal Pradesh</option>
                                <option>Jammu and Kashmir</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kerala</option>
                                <option>Madhya Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Manipur</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Punjab</option>
                                <option>Rajasthan</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Telangana</option>
                                <option>Tripura</option>
                                <option>Uttarakhand</option>
                                <option>Uttar Pradesh</option>
                                <option>West Bengal</option>
                                <option>Andaman and Nicobar Islands</option>
                                <option>Chandigarh</option>
                                <option>Dadra and Nagar Haveli</option>
                                <option>Daman and Diu</option>
                                <option>Delhi</option>
                                <option>Lakshadweep</option>
                                <option>Puducherry</option>
                                <option>others</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="col-lg-12 form-group">
                            <label class="fw-bold">Message *</label>
                            <textarea class="form--control" name="message" placeholder="Type your message" rows="4" required></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn--base mt-10 w-100">
                                Submit Now <i class="icon-Group-2361 ml-2"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    // --- Custom CAPTCHA Generation ---
    let captchaCode = "";

    function generateCaptcha() {
        const canvas = document.getElementById("captchaCanvas");
        const ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        const chars = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
        captchaCode = "";
        for (let i = 0; i < 6; i++) {
            captchaCode += chars.charAt(Math.floor(Math.random() * chars.length));
        }

        ctx.font = "bold 28px Arial";
        ctx.fillStyle = "#333";
        ctx.fillText(captchaCode, 30, 35);
    }

    document.getElementById("refreshCaptcha").addEventListener("click", generateCaptcha);
    generateCaptcha();

    // --- CAPTCHA Verification ---
    document.getElementById("captchaForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const input = document.getElementById("captchaInput").value.trim().toUpperCase();

        if (input === captchaCode) {
            alert("Captcha Verified Successfully!");
            document.getElementById("captchaSection").style.display = "none";
            document.getElementById("otpSection").style.display = "block";
        } else {
            alert("Incorrect Captcha. Try Again!");
            generateCaptcha();
        }
    });

    // --- OTP Verification ---
    document.getElementById("otpForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const otp = document.getElementById("otpInput").value.trim();

        if (otp === "1234") { // demo OTP for now
            alert("OTP Verified Successfully!");
            document.getElementById("otpSection").style.display = "none";
            document.getElementById("enquiryFormSection").style.display = "block";
        } else {
            alert("Invalid OTP. Try Again!");
        }
    });
</script>
@endsection

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursePhaseController;
use App\Http\Controllers\CourseEligibilityController;
use App\Http\Controllers\SelectionProcessController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HeroController;

use App\Http\Controllers\CtaController;
use App\Http\Controllers\CareerPilotController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\WhyChooseController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CourseAboutController;
use App\Http\Controllers\AboutPageController;

use App\Http\Controllers\WhyVaaController;

use App\Http\Controllers\AdvantageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
// Route::view('/about', 'pages.about');
Route::view('/courses', 'pages.course');
Route::view('/courses-details', 'pages.course-details');
Route::view('/admissions', 'pages.admissions');
Route::view('/facility', 'pages.facility');
Route::get('/gallery', [HomeController::class, 'gallery']);
// Route::view('/gallery', 'pages.gallery');
Route::view('/contact-us', 'pages.contact-us');
Route::view('/work-with-us', 'pages.work-with-us');
Route::view('/faq', 'pages.faq');
Route::view('/enquire', 'pages.enquire');
Route::get('/the-vaa-advantages', [HomeController::class, 'advantage']);
// Route::view('/the-vaa-advantages', 'pages.the-vaa-advantages');


/*
|--------------------------------------------------------------------------
| Admin Login Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:employee', 'role:Admin'])->group(function () {
    // Existing admin resource routes...

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('homecareer', \App\Http\Controllers\HomeCareerController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        // Role-Permission Routes
        Route::get('role-permissions', [RoleHasPermissionController::class, 'index'])->name('role-permissions.index');
        Route::get('role-permissions/{role_id}/edit', [RoleHasPermissionController::class, 'edit'])->name('role-permissions.edit');
        Route::put('role-permissions/{role_id}', [RoleHasPermissionController::class, 'update'])->name('role-permissions.update');

        // Hero Routes
        Route::resource('hero', HeroController::class);

        // Why Vaa
        Route::resource('whyvaa', WhyVaaController::class);

        // About us Routes
        Route::resource('about', AboutUsController::class);

        // Why Vihanga Routes
        Route::resource('highlights', HighlightController::class);

        // Courses Routes
        Route::resource('courses', CourseController::class);

        // Cta Routes
        Route::resource('cta', CtaController::class);

        // Career Pilot Routes
        Route::resource('career_pilot', CareerPilotController::class);

        // Vision Mission Routes
        Route::resource('vision_mission', VisionMissionController::class);

        // Why Choose Routes
        Route::resource('why_choose', WhyChooseController::class);

        // Testimonials Routes
        Route::resource('testimonial', TestimonialController::class);

        // Course About Routes
        Route::resource('course_about', CourseAboutController::class);

        // About Page Routes
        Route::resource('about_page', AboutPageController::class);

        // Course Phases Routes
        Route::resource('course_phases', CoursePhaseController::class);

        // Course Eligibilities Routes
        Route::resource('course_eligibilities', CourseEligibilityController::class);

        // Selection Processes Routes
        Route::resource('selection_processes', SelectionProcessController::class);

        // Facilities Routes
        Route::resource('facilities', FacilityController::class);

        // Advantages Routes
        Route::resource('advantage', AdvantageController::class);

        // Careers Routes
        Route::resource('careers', CareerController::class);

        // Gallery Routes
        Route::resource('gallery', GalleryController::class);
        Route::delete('gallery/{gallery}/image', [GalleryController::class, 'deleteImage'])->name('gallery.deleteImage');

        // FAQ Routes
        Route::resource('faq', FaqController::class);
    });
});

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Course;
use App\Models\Facility;
use App\Models\Cta;
use App\Models\CareerPilot;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use App\Models\VisionMission;
use App\Models\FAQ;
use App\Models\Hero;
use App\Models\AboutPage;
use App\Models\AcademicFeature;
use App\Models\Advantage;
use App\Models\Strength;
use App\Models\Infrastructure;
use App\Models\Record;
use App\Models\Excellence;
use App\Models\WhyVaa;
use App\Models\CourseAbout;
use App\Models\CoursePhase;
use App\Models\CourseEligibility;
use App\Models\Info;
use App\Models\SelectionProcess;
use App\Models\ContactForm;
use App\Models\State;
use App\Models\City;
use App\Models\FacilityHero;
use App\Models\Aircraft;

class HomeController extends Controller
{

    public function index()
    {

        $hero = Hero::where('is_active', 1)->first();
        $about = About::where('is_active', 1)->first();
        $course_detail = Course::all();
        $facilities = Facility::where('is_active', 1)->get();
        $cta = Cta::where('is_active', 1)->first();
        // $career_pilot = CareerPilot::first();
        $career_pilot = CareerPilot::where('is_active', 1)
            ->whereNotNull('title')
            ->whereNotNull('description')
            ->first();
        // $career_pilots = CareerPilot::whereNull(['title', 'description'])->get();
        $career_pilots = CareerPilot::where('is_active', 1)
            ->whereNull('title')
            ->whereNull('description')
            ->get();
        //return $career_pilots; 
        $galleries = Gallery::latest()->take(9)->get();
        $faq = FAQ::where('is_active', 1)
            ->first();
        $faqs = FAQ::where('is_active', 1)
            ->get();
        $why_vaa = WhyVaa::where('is_active', 1)->get();
        $courses = Course::get();
        return view('pages.index', compact('hero', 'about', 'course_detail', 'facilities', 'cta', 'career_pilot', 'career_pilots', 'galleries', 'faq', 'faqs', 'why_vaa', 'courses'));
    }

    public function enquire()
    {
        $courses = Course::get();
        $states = State::get();
        $cities = City::get();
        return view('pages.enquire', compact('courses', 'states', 'cities'));
    }

    public function contact()
    {
        $courses = Course::get();
        return view('pages.contact-us', compact('courses'));
    }

    public function gallery()
    {
        $galleries = Gallery::get();
        return view('pages.gallery', compact('galleries'));
    }

    public function about()
    {
        $about_page = AboutPage::where('is_active', 1)->first();
        $testimonial = Testimonial::where('is_active', 1)->first();
        $testimonials = Testimonial::where('is_active', 1)->get();
        $why_choose = WhyChoose::where('is_active', 1)->first();
        $why_chooses = WhyChoose::where('is_active', 1)->get();
        $vision_mission = VisionMission::where('is_active', 1)->first();
        $faq = FAQ::where('is_active', 1)
            ->first();
        $faqs = FAQ::where('is_active', 1)
            ->get();
        return view('pages.about', compact('about_page', 'testimonial', 'testimonials', 'why_choose', 'why_chooses', 'vision_mission', 'faq', 'faqs'));
    }

    public function advantage()
    {
        $advantage = Advantage::where('is_active', 1)->first();
        $strength = Strength::where('is_active', 1)->first();
        $strengths = Strength::where('is_active', 1)->get();
        // return $strengths;
        $infrastructure = Infrastructure::where('is_active', 1)
            ->whereNotNull('title')
            ->whereNotNull('sub_title')
            ->first();
        $infrastructures = Infrastructure::where('is_active', 1)
            ->get();
        $record = Record::where('is_active', 1)
            ->whereNotNull('title')
            ->first();
        $records = Record::where('is_active', 1)
            ->get();
        $excellence = Excellence::where('is_active', 1)
            ->whereNotNull('title')
            ->whereNotNull('sub_title')
            ->first();
        $excellences = Excellence::where('is_active', 1)->get();
        $academic_feature = AcademicFeature::where('is_active', 1)->first();
        $academic_features = AcademicFeature::where('is_active', 1)->get();
        return view('pages.the-vaa-advantages', compact(
            'advantage',
            'strength',
            'strengths',
            'infrastructure',
            'infrastructures',
            'record',
            'records',
            'excellence',
            'excellences',
            'academic_feature',
            'academic_features'
        ));
    }

    public function course_detail($course_url)
    {
        $course = Course::where('course_url', $course_url)->first();
        $course_about = CourseAbout::where('course_id', $course->id)->first();
        //return $course_about;
        $course_phases = CoursePhase::where('course_id', $course->id)->get();
        // return $course_phases;
        $course_eligibility = CourseEligibility::where('course_id', $course->id)->first();
        // return $course_eligibility;
        // $course_selection_process = SelectionProcess::where('course_id', $course->id)->get();
        $course_selection_process = SelectionProcess::where('course_id', $course->id)
            ->where('is_active', 1)
            ->get();
        // return $course_selection_process;
        $infos = Info::where('course_id', $course->id)->get();
        // return $infos;
        return view('pages.course', compact(
            'course',
            'course_about',
            'course_phases',
            'course_eligibility',
            'course_selection_process',
            'infos'
        ));
    }

    // public function facilities ($facility_url){
    //     $facilities = Facility::where('facility_url', $facility_url)->first();
    //     return view('pages.facility', compact('facilities'));
    // }

    public function facilities($facility_url)
    {
        $facility = Facility::where('facility_url', $facility_url)
            ->where('is_active', 1)
            ->firstOrFail();

        $hero = FacilityHero::where('facility_id', $facility->id)
            ->where('is_active', 1)
            ->first();

        $aircrafts = Aircraft::where('facility_id', $facility->id)
            ->where('is_active', 1)
            ->get();

        // Decode features JSON for each aircraft
        $aircrafts->transform(function ($aircraft) {
            $aircraft->features = json_decode($aircraft->features, true) ?? [];
            return $aircraft;
        });

        return view('pages.facilities', compact('facility', 'hero', 'aircrafts'));
    }
}

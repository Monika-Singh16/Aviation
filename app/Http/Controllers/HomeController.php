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

class HomeController extends Controller
{
    public function index (){

        $hero = Hero::first();
        $about = About::first();
        $course_detail = Course::all();
        $facility = Facility::all();
        $cta = Cta::first();
        $career_pilot = CareerPilot::first();
        $career_pilots = CareerPilot::whereNull(['title', 'description'])->get();
        //return $career_pilots; 
        $galleries = Gallery::latest()->take(9)->get();
        $faq = FAQ::first();
        $faqs = FAQ::whereNull(['heading', 'description'])->get();
        //return $faqs;
        $why_vaa = WhyVaa::get();
        return view('pages.index', compact('hero', 'about', 'course_detail', 'facility', 'cta', 'career_pilot','career_pilots', 'galleries', 'faq', 'faqs', 'why_vaa'));
    }

    public function gallery (){
        $galleries = Gallery::get();
        return view('pages.gallery', compact('galleries'));
    }

    public function about (){
        $about_page = AboutPage::where('is_active', 1)->first();
        $testimonial = Testimonial::first();
        $testimonials = Testimonial::get();
        $why_choose = WhyChoose::first();
        $why_chooses = WhyChoose::get();
        $vision_mission = VisionMission::first();
        $faq = FAQ::first();
        $faqs = FAQ::whereNull(['heading', 'description'])->get();
        return view('pages.about', compact('about_page','testimonial','testimonials','why_choose','why_chooses', 'vision_mission', 'faq', 'faqs'));
    }

    public function advantage (){
        $advantage = Advantage::where('is_active', 1)->first();
        $strength = Strength::first();
        $strengths = Strength::get();
        // return $strengths;
        $infrastructure = Infrastructure::first();
        $infrastructures = Infrastructure::get();
        $record = Record::first();
        $records = Record::get();
        $excellence = Excellence::first();
        $excellences = Excellence::get();
        $academic_feature = AcademicFeature::first();
        $academic_features = AcademicFeature::get();
        return view('pages.the-vaa-advantages', compact('advantage','strength', 'strengths','infrastructure','infrastructures', 
        'record', 'records','excellence', 'excellences','academic_feature', 'academic_features'));
    }

    public function course_detail ($course_url){
        $course= Course::where('course_url', $course_url)->first();
        $course_about = CourseAbout::where('course_id', $course->id)->first();
        //return $course_about;
        $course_phases = CoursePhase::where('course_id', $course->id)->get();
        // return $course_phases;
        $course_eligibility = CourseEligibility::where('course_id', $course->id)->first();
        // return $course_eligibility;
        $course_selection_process = SelectionProcess::where('course_id', $course->id)->first();
        // return $course_selection_process;
        $infos = Info::where('course_id', $course->id)->get();
        // return $infos;
        return view('pages.course', compact('course','course_about' ,'course_phases', 
            'course_eligibility', 'course_selection_process', 'infos'));
    }
    
}

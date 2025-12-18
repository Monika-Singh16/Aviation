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
use App\Models\Advantage;

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
        return view('pages.index', compact('hero', 'about', 'course_detail', 'facility', 'cta', 'career_pilot','career_pilots', 'galleries', 'faq', 'faqs'));
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
        return view('pages.the-vaa-advantages', compact('advantage'));
    }
    
}

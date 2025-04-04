<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Popup;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Publication;
use App\Models\Service;

class FrontendController extends Controller
{
    public function homepage()
    {
        // $aboutUs = AboutUs::first();
        // $popup = Popup::active()->orderBy('display_order', 'ASC')->get();
        // $popupPaths = $popup->pluck('photo')->map(fn($path) => asset('storage' . $path));
        // $howToBecameAnAgent = Page::where('slug', 'how-become-an-agent')->first();
        // $sliders = Slider::active()->orderBy('display_order', 'ASC')->get();
        // $services = Service::active()->orderBy('display_order', 'ASC')->get();
        // $notices = Publication::active()->where('publication_type', 'notice')->orderBy('display_order', 'ASC')->get();
        // $galleries = Gallery::active()->where('is_published', 1)->take(9)->latest()->get();
        // return view('frontend.homepage', compact('aboutUs', 'popup', 'popupPaths', 'howToBecameAnAgent', 'sliders', 'services', 'notices', 'galleries',));

        return view('frontend.homepage');
    }

    public function aboutUs()
    {
        return view('frontend.about-us-page');
    }
    public function becomeAnAgent()
    {
        return view('frontend.become-an-agent');
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    public function findAnAgent()
    {
        return view('frontend.find-an-agent');
    }
    public function gallery()
    {
        return view('frontend.gallery');
    }
    public function grievances()
    {
        return view('frontend.grievances');
    }
    public function messageFromDirector()
    {
        return view('frontend.message-from-director');
    }
    public function missionAndVision()
    {
        return view('frontend.mission-and-vision');
    }
    public function newsAndEvents()
    {
        return view('frontend.news-and-events');
    }
    public function newsAndEventsDetailPage()
    {
        return view('frontend.news-and-events-detail-page');
    }
    public function organizationalStructure()
    {
        return view('frontend.organizational-structure');
    }
    public function privacyAndPolicy()
    {
        return view('frontend.privacy-and-policy');
    }
    public function quickLinks()
    {
        return view('frontend.quick-links');
    }
    public function sitemap()
    {
        return view('frontend.sitemap');
    }
    public function termsAndConditions()
    {
        return view('frontend.terms-and-conditions');
    }
}

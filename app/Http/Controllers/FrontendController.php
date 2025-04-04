<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Popup;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\ServiceTranslation;

class FrontendController extends Controller
{
    public function homepage()
    {
        $slider = Slider::active()->orderBy('display_order', 'ASC')->get();
        $popup = Popup::active()->orderBy('display_order', 'ASC')->get();
        $aboutUs = AboutUs::first();
        $services = Service::active()->orderBy('display_order', 'ASC')->get();
        $serviceTranslations = ServiceTranslation::whereIn('service_id', $services->pluck('id'))->get();
        return view('frontend.homepage', compact('slider', 'popup', 'aboutUs', 'services', 'serviceTranslations'));
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

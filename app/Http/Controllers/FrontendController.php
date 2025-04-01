<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        return view('frontend.homepage');
    }
    public function aboutUs()
    {
        return view('frontend.about-us');
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

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
use App\Models\ServiceTranslation;
use App\Models\Setting;
use App\Models\ContactUs;
use App\Models\NewsEventCategory;

use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\BecomeAnAgentRequest;

use App\Models\Partner;
use App\Models\BecomeAnAgent;

class FrontendController extends Controller
{

        public function homepage()
    {
        $aboutUs = AboutUs::active()->orderBy('display_order', 'ASC')->first();
        $aboutUs1 = AboutUs::active()->orderBy('display_order', 'ASC')->skip(1)->first();
        $popup = Popup::active()->orderBy('display_order', 'ASC')->get();
        $popupPaths = $popup->pluck('photo')->map(fn($path) => asset('storage' . $path));
        $howToBecameAnAgent = Page::where('slug', 'how-become-an-agent')->first();
        $sliders = Slider::active()->orderBy('display_order', 'ASC')->get();
        $services = Service::active()->orderBy('display_order', 'ASC')->get();
        $notices = Publication::active()->where('publication_type', 'notice')->orderBy('display_order', 'ASC')->get();
        $galleries = Gallery::active()->where('is_published', 1)->take(9)->latest()->get();
        $newsAndEvents=NewsEventCategory::active()->orderBy('display_order', 'ASC')->get();

        $partners = Partner::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.homepage', compact('aboutUs', 'popup', 'popupPaths', 'howToBecameAnAgent', 'sliders', 'services', 'notices', 'galleries', 'partners','newsAndEvents'));

    }

    public function aboutHulasRemittance()
    {
        $setting = Setting::first();
        $aboutUs = AboutUs::active()->orderBy('display_order', 'ASC')->first();
        $services=Service::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.about-hulas-page', compact('aboutUs','services','setting'));
    }

    public function aboutWesternUnion()
    {
        $aboutUs1 = AboutUs::active()->orderBy('display_order', 'ASC')->skip(1)->first();
        $services=Service::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.about-western-union-page', compact('aboutUs1','services'));
    }

    public function becomeAnAgent()
    {
        $setting = Setting::first();
        return view('frontend.become-an-agent',compact("setting"));
    }
    public function contactUs()
    {
        $setting = Setting::first();
        return view('frontend.contact-us', compact('setting'));
    }
    public function findAnAgent()
    {
        return view('frontend.find-an-agent');
    }
    public function forexRate()
    {
        return view('frontend.forex-rate');
    }
    public function gallery()
    {
        $galleries = Gallery::active()->where('is_published', 1)->take(9)->latest()->get();
        return view('frontend.gallery', compact('galleries'));
    }
    public function galleryDetail($id = null)
    {
        if ($id) {
            $gallery = Gallery::findOrFail($id);
            return view('frontend.gallery-detail', compact('gallery'));
        }
        return redirect()->route('gallery');
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
        $aboutUs = AboutUs::active()->orderBy('display_order', 'ASC')->first();
        $missions = json_decode($aboutUs->mission_vision, true);
        return view('frontend.mission-and-vision', compact('missions'));
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

    public function header()
    { 
        $setting = Setting::first();
        return view('frontend.layouts.partials.header', compact('setting'));
    }

    /**
     * Store a contact inquiry from the frontend form.
     */
    public function storeContactInquiry(ContactUsRequest $request)
    {
        try {
            // Validate and get data
            $data = $request->validated();
            
            // Set default values for backend fields
            $data['is_contacted'] = false;
            $data['display_order'] = 0;
            
            // Create contact inquiry
            ContactUs::create($data);
            
            // Check if this is an AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us. We will get back to you soon!'
                ]);
            }
            
            // Regular form submission - redirect with success message
            return redirect('/contact-us')
                ->with('success', 'Thank you for contacting us. We will get back to you soon!');
                
        } catch (\Exception $e) {
            // Log error and return with error message
            \Log::error('Contact form submission error: ' . $e->getMessage());
            
            // Check if this is an AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'There was a problem submitting your inquiry. Please try again later.'
                ], 422);
            }
            
            // Regular form submission - redirect with error message
            return redirect('/contact-us')
                ->with('error', 'There was a problem submitting your inquiry. Please try again later.')
                ->withInput();
        }
    }

    /**
     * Store an agent request from the frontend form.
     */
    public function storeAgentRequest(BecomeAnAgentRequest $request)
    {
        try {
            // Validate and get data
            $data = $request->validated();
            
            // Set default values for backend fields
            $data['is_contacted'] = false;
            
            // Create agent request
            BecomeAnAgent::create($data);
            
            // Redirect to the become-an-agent page with success message
            return redirect('/become-an-agent')
                ->with('success', 'Thank you for your interest in becoming an agent. We will contact you soon!');
                
        } catch (\Exception $e) {
            // Log error and return with error message
            \Log::error('Agent request form submission error: ' . $e->getMessage());
            
            return redirect('/become-an-agent')
                ->with('error', 'There was a problem submitting your request. Please try again later.')
                ->withInput();
        }
    }
}

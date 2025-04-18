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
use App\Models\QuickLink;
use App\Models\ServiceTranslation;
use App\Models\Setting;
use App\Models\ContactUs;
use App\Models\NewsEventCategory;

use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\BecomeAnAgentRequest;
use App\Models\AgentDetail;
use App\Models\Partner;
use App\Models\BecomeAnAgent;
use App\Models\Download;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{

    public function homepage()
    {
        $aboutUs = AboutUs::active()->orderBy('display_order', 'ASC')->first();
        $aboutUs1 = AboutUs::active()->orderBy('display_order', 'ASC')->skip(1)->first();
        $popups = Popup::active()->orderByDisplayOrder()->get();
        $howToBecameAnAgent = Page::where('slug', 'how-become-an-agent')->first();
        $sliders = Slider::active()->orderBy('display_order', 'ASC')->get();
        $services = Service::active()->orderBy('display_order', 'ASC')->get();
        $notices = Publication::active()->where('publication_type', 'notice')->orderBy('display_order', 'ASC')->get();
        $galleries = Gallery::active()->where('is_published', 1)->take(9)->latest()->get();
        $newsAndEvents = NewsEventCategory::active()->orderBy('display_order', 'ASC')->get();

        $partners = Partner::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.homepage', compact('aboutUs', 'popups', 'howToBecameAnAgent', 'sliders', 'services', 'notices', 'galleries', 'partners', 'newsAndEvents'));
    }

    public function aboutHulasRemittance()
    {
        $setting = Setting::first();
        $aboutUs = AboutUs::active()->orderBy('display_order', 'ASC')->first();
        $services = Service::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.about-hulas-page', compact('aboutUs', 'services', 'setting'));
    }

    public function aboutWesternUnion()
    {
        $aboutUs1 = AboutUs::active()->orderBy('display_order', 'ASC')->skip(1)->first();
        $services = Service::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.about-western-union-page', compact('aboutUs1', 'services'));
    }

    public function becomeAnAgent()
    {
        $settings = Setting::first();

        return view('frontend.become-an-agent', compact('settings'));
    }
    public function contactUs()
    {
        $setting = Setting::first();
        return view('frontend.contact-us', compact('setting'));
    }
    public function findAnAgent()
    {
        $agentDetails = AgentDetail::orderBy('display_order')->get();

        return view('frontend.find-an-agent', compact('agentDetails'));
    }
    
    public function forexRate()
    {
        // Get today's forex rate, or the latest one if today's not available
        $forexRate = \App\Models\ForexRate::orderBy('date', 'desc')->first();

        $morningRates = collect($forexRate->slots['morning'] ?? [])->filter(function ($rate) {
            return $rate['is_published'] ?? false;
        });

        $afternoonRates = collect($forexRate->slots['afternoon'] ?? [])->filter(function ($rate) {
            return $rate['is_published'] ?? false;
        });

        return view('frontend.forex-rate', compact('forexRate', 'morningRates', 'afternoonRates'));
    }

    public function services()
    {
        $services = Service::active()->orderByDisplayOrder()->get();
        return view('frontend.services', compact('services'));
    }
    public function serviceDetail($slug = null)
    {
        if ($slug) {
            $service = Service::active()->where('slug', $slug)->firstOrFail();
            return view('frontend.service-detail', compact('service'));
        }
        return redirect()->route('services');
    }
    public function gallery()
    {
        $galleries = Gallery::active()->where('is_published', 1)->take(9)->latest()->get();
        return view('frontend.gallery', compact('galleries'));
    }
    public function galleryDetail($slug = null)
    {
        if ($slug) {
            $gallery = Gallery::where('slug', $slug)->firstOrFail();
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
        
        // Handle mission_vision safely (could be array or string)
        $missions = [];
        if ($aboutUs && $aboutUs->mission_vision) {
            // decode granu pardaina, the accessor in the model will handle this
            $missions = $aboutUs->mission_vision;
        }
        
        // Get mission_vision_images from about_us
        $mission_vision_images = [];
        if ($aboutUs && $aboutUs->mission_vision_images) {
            $mission_vision_images = $aboutUs->mission_vision_images;
        }
        
        return view('frontend.mission-and-vision', compact('aboutUs', 'missions', 'mission_vision_images'));
    }
    public function newsAndEvents()
    {
        $newsAndEvents = NewsEventCategory::active()->orderBy('display_order', 'ASC')->get();
        return view('frontend.news-and-events', compact('newsAndEvents'));
    }
    public function newsAndEventsDetailPage($id = null)
    {
        if ($id) {
            $newsEvent = NewsEventCategory::findOrFail($id);
            $otherNewsEvents = NewsEventCategory::active()->where('id', '!=', $id)->take(10)->get();
            $setting = Setting::first();
            return view('frontend.news-and-events-detail-page', compact('newsEvent', 'otherNewsEvents', 'setting'));
        }
        return redirect()->route('newsAndEvents');
    }
    public function organizationalStructure()
    {
        $boardOfDirectors = Team::active()->where('type', Team::TYPE_BOD)->orderByDisplayOrder()->get();
        $managementTeam = Team::active()->where('type', Team::TYPE_MANAGEMENT)->orderByDisplayOrder()->get();
        return view('frontend.organizational-structure', compact('boardOfDirectors', 'managementTeam'));
    }
    public function downloads()
    {
        $downloads = Download::active()->orderBy('display_order', 'ASC')
            ->paginate(6);

        return view('frontend.downloads', compact('downloads'));
    }

    public function downloadFile(Download $download)
    {
        if (!$download->file || !Storage::disk('public')->exists($download->file)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        $path = Storage::disk('public')->path($download->file);
        $fileName = basename($download->file);

        return response()->download($path, $fileName);
    }

    public function privacyAndPolicy()
    {
        return view('frontend.privacy-and-policy');
    }
    public function quickLinks()
    {
        $quickLinks = QuickLink::active()->orderBy('display_order', 'ASC')->get();       

        return view('frontend.quick-links', compact('quickLinks'));
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

    public function footer()
    {
        $setting = Setting::first();
        $aboutUs = AboutUs::active()->orderBy('display_order', 'ASC')->first();
        return view('frontend.layouts.partials.footer', compact('setting', 'aboutUs'));
    }
}

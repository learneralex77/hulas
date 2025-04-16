<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            [
                'name_en' => 'Home',
                'name_np' => 'गृहपृष्ठ',
                'description_en' => 'Home',
                'description_np' => 'गृहपृष्ठ',
                'display_order' => 1,
                'slug' => 'homepage',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'About Us',
                'name_np' => 'हाम्रो बारेमा',
                'description_en' => 'About Us',
                'description_np' => 'हाम्रो बारेमा',
                'display_order' => 2,
                'slug' => 'about-us',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'About Hulas Remittance',
                'name_np' => 'हुलास रेमिटेन्स बारे',
                'description_en' => 'About Hulas Remittance',
                'description_np' => 'हुलास रेमिटेन्स बारे',
                'display_order' => 3,
                'slug' => 'about-hulas-remittance',
                'is_published' => true,
                'parent_id' => 2
            ],
            [
                'name_en' => 'About Western Union',
                'name_np' => 'वेस्टर्न युनियन बारे',
                'description_en' => 'About Western Union',
                'description_np' => 'वेस्टर्न युनियन बारे',
                'display_order' => 4,
                'slug' => 'about-western-union',
                'is_published' => true,
                'parent_id' => 2
            ],
            [
                'name_en' => 'Mission and Vision',
                'name_np' => 'उद्देश्य र दृष्टिकोण',
                'description_en' => 'Mission and Vision',
                'description_np' => 'उद्देश्य र दृष्टिकोण',
                'display_order' => 5,
                'slug' => 'mission-and-vision',
                'is_published' => true,
                'parent_id' => 2
            ],
            [
                'name_en' => 'Message from Director',
                'name_np' => 'निर्देशकको सन्देश',
                'description_en' => 'Message from Director',
                'description_np' => 'निर्देशकको सन्देश',
                'display_order' => 6,
                'slug' => 'message-from-director',
                'is_published' => true,
                'parent_id' => 2
            ],
            [
                'name_en' => 'Organizational Structure',
                'name_np' => 'संगठनात्मक संरचना',
                'description_en' => 'Organizational Structure',
                'description_np' => 'संगठनात्मक संरचना',
                'display_order' => 7,
                'slug' => 'organizational-structure',
                'is_published' => true,
                'parent_id' => 2
            ],
            [
                'name_en' => 'Services',
                'name_np' => 'सेवाहरू',
                'description_en' => 'Services',
                'description_np' => 'सेवाहरू',
                'display_order' => 8,
                'slug' => 'services',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'Send Money',
                'name_np' => 'पैसा पठाउने',
                'description_en' => 'Send Money',
                'description_np' => 'पैसा पठाउने',
                'display_order' => 9,
                'slug' => 'services/send-money',
                'is_published' => true,
                'parent_id' => 8
            ],
            [
                'name_en' => 'Receive Money',
                'name_np' => 'पैसा प्राप्त गर्ने',
                'description_en' => 'Receive Money',
                'description_np' => 'पैसा प्राप्त गर्ने',
                'display_order' => 10,
                'slug' => 'services/receive-money',
                'is_published' => true,
                'parent_id' => 8
            ],
            [
                'name_en' => 'Track Money',
                'name_np' => 'पैसाको स्थिति ट्र्याक गर्ने',
                'description_en' => 'Track Money',
                'description_np' => 'पैसाको स्थिति ट्र्याक गर्ने',
                'display_order' => 11,
                'slug' => 'services/track-money',
                'is_published' => true,
                'parent_id' => 8
            ],
            [
                'name_en' => 'Become an Agent ',
                'name_np' => 'एजेन्ट बन्नुहोस्',
                'description_en' => 'Become an Agent ',
                'description_np' => 'एजेन्ट बन्नुहोस्',
                'display_order' => 12,
                'slug' => 'become-an-agent',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'Find an Agent',
                'name_np' => 'एजेन्ट खोज्नुहोस्',
                'description_en' => 'Find an Agent',
                'description_np' => 'एजेन्ट खोज्नुहोस्',
                'display_order' => 13,
                'slug' => 'find-an-agent',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'Contact Us',
                'name_np' => 'सम्पर्क गर्नुहोस्',
                'description_en' => 'Contact Us',
                'description_np' => 'सम्पर्क गर्नुहोस्',
                'display_order' => 14,
                'slug' => 'contact-us',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'More ',
                'name_np' => 'थप लिंकहरू',
                'description_en' => 'More ',
                'description_np' => 'थप लिंकहरू',
                'display_order' => 15,
                'slug' => 'more',
                'is_published' => true,
                'parent_id' => null
            ],
            [
                'name_en' => 'Downloads ',
                'name_np' => 'डाउनलोडहरू',
                'description_en' => 'Downloads ',
                'description_np' => 'डाउनलोडहरू',
                'display_order' => 16,
                'slug' => 'downloads',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'News and Events',
                'name_np' => 'समाचार र कार्यक्रमहरू',
                'description_en' => 'News and Events',
                'description_np' => 'समाचार र कार्यक्रमहरू',
                'display_order' => 17,
                'slug' => 'news-and-events',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Gallery',
                'name_np' => 'ग्यालेरी',
                'description_en' => 'Gallery',
                'description_np' => 'ग्यालेरी',
                'display_order' => 18,
                'slug' => 'gallery',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Grievances',
                'name_np' => 'गुनासाहरू',
                'description_en' => 'Grievances',
                'description_np' => 'गुनासाहरू',
                'display_order' => 19,
                'slug' => 'grievances',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Privacy and Policy',
                'name_np' => 'गोपनीयता र नीतिहरू',
                'description_en' => 'Privacy and Policy',
                'description_np' => 'गोपनीयता र नीतिहरू',
                'display_order' => 20,
                'slug' => 'privacy-and-policy',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Terms and Conditions',
                'name_np' => 'नियम तथा सर्तहरू',
                'description_en' => 'Terms and Conditions',
                'description_np' => 'नियम तथा सर्तहरू',
                'display_order' => 21,
                'slug' => 'terms-and-conditions',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Quick Links',
                'name_np' => 'छिटो पहुँच लिंकहरू',
                'description_en' => 'Quick Links',
                'description_np' => 'छिटो पहुँच लिंकहरू',
                'display_order' => 22,
                'slug' => 'quick-links',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Sitemap',
                'name_np' => 'साइट नक्सा',
                'description_en' => 'Sitemap',
                'description_np' => 'साइट नक्सा',
                'display_order' => 23,
                'slug' => 'sitemap',
                'is_published' => true,
                'parent_id' => 15
            ],
            [
                'name_en' => 'Forex Rate',
                'name_np' => 'विनिमय दर',
                'description_en' => 'Forex Tate',
                'description_np' => 'विनिमय दर',
                'display_order' => 24,
                'slug' => 'forex-rate',
                'is_published' => true,
                'parent_id' => 15
            ],
        ]);
    }
}

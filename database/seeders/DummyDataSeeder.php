<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Banners
        \App\Models\Banner::updateOrCreate(['title' => 'Building Your Dreams with Excellence'], [
            'subtitle' => 'Aadya Construction',
            'button_text' => 'Our Vehicles',
            'button_link' => '/vehicles',
            'image' => 'assets/user/images/banner-slider-img/demo-01-slide-1.jpg',
            'status' => 1
        ]);
        \App\Models\Banner::updateOrCreate(['title' => 'Streamlined Logistics for Global Needs'], [
            'subtitle' => 'Logistic Solutions',
            'button_text' => 'Our Vehicles',
            'button_link' => '/vehicles',
            'image' => 'assets/user/images/banner-slider-img/demo-02-slide-1.jpg',
            'status' => 1
        ]);

        // Categories
        $cat1 = \App\Models\Category::updateOrCreate(['title' => 'Heavy Machinery'], [
            'description' => 'Heavy-duty construction equipment.',
            'image' => 'assets/user/images/homepage-1/service/service-01.jpg',
            'status' => 1
        ]);
        $cat2 = \App\Models\Category::updateOrCreate(['title' => 'Transport Vehicles'], [
            'description' => 'Logistics and transport solutions.',
            'image' => 'assets/user/images/homepage-1/service/service-02.jpg',
            'status' => 1
        ]);

        // Vehicles
        \App\Models\Vehicle::updateOrCreate(['title' => 'Excavator Model X'], [
            'description' => 'Powerful excavator for heavy-duty digging and earthmoving.',
            'image' => 'assets/user/images/service/service-img-01.jpg',
            'category_id' => $cat1->id,
            'status' => 1
        ]);
        \App\Models\Vehicle::updateOrCreate(['title' => 'Logistics Truck 500'], [
            'description' => 'Reliable transport truck for long-distance logistics.',
            'image' => 'assets/user/images/service/service-img-02.jpg',
            'category_id' => $cat2->id,
            'status' => 1
        ]);

        // Clients
        foreach (range(1, 5) as $i) {
            \App\Models\Client::updateOrCreate(['name' => "Client Brand $i"], [
                'logo' => "assets/user/images/client/client-dark-0$i.png",
                'status' => 1
            ]);
        }

        // History
        \App\Models\History::updateOrCreate(['title' => 'Our Humble Beginnings'], [
            'description' => 'Started with a single truck and a dream to revolutionize construction logistics.',
            'year' => '2010',
            'image' => 'assets/user/images/homepage-2/about-img.jpg'
        ]);

        // Testimonials
        \App\Models\Testimonial::updateOrCreate(['name' => 'John Doe'], [
            'position' => 'Project Manager',
            'content' => 'Aadya Construction provided exceptional service and timely delivery of machinery.',
            'status' => 1
        ]);

        // Countries
        foreach (['India', 'USA', 'Germany', 'Japan', 'UAE'] as $country) {
            \App\Models\Country::updateOrCreate(['name' => $country], [
                'code' => strtoupper(substr($country, 0, 2)),
                'status' => 1
            ]);
        }

        // FAQs
        $faqs = [
            ['q' => 'What types of vehicles do you provide?', 'a' => 'We provide heavy machinery like excavators, cranes, dump trucks, and specialized transport vehicles.'],
            ['q' => 'How can I get a quote?', 'a' => 'You can use our contact form or call our support line for a customized logistics and equipment quote.'],
            ['q' => 'Do you offer international shipping?', 'a' => 'Yes, we have a global presence and handle construction logistics for various nations worldwide.'],
            ['q' => 'Are your vehicles maintained?', 'a' => 'Absolutely. All our vehicles undergo rigorous safety and performance checks before being dispatched.'],
            ['q' => 'Can I rent equipment for short-term projects?', 'a' => 'Yes, we offer flexible rental plans ranging from daily to monthly durations.'],
            ['q' => 'What is your response time for support?', 'a' => 'Our support team is available 24/7 and usually responds within 2 hours for urgent site needs.'],
            ['q' => 'Do you provide operators with the machinery?', 'a' => 'Yes, we have certified operators available if your project requires expert handling.'],
            ['q' => 'Is insurance included in the rental?', 'a' => 'Basic insurance is included, but we recommend additional coverage for high-risk construction zones.'],
            ['q' => 'How do you handle equipment breakdowns?', 'a' => 'We provide immediate on-site repair or a replacement vehicle to ensure your project stays on schedule.'],
            ['q' => 'What are your payment terms?', 'a' => 'We accept various payment methods including bank transfers and major credit cards, with flexible credit terms for verified partners.'],
            ['q' => 'Do you handle customs clearance for global projects?', 'a' => 'Yes, our global logistics team manages all documentation and customs clearance for overseas transport.'],
            ['q' => 'Can I track my transport vehicles?', 'a' => 'Yes, all our logistics trucks are equipped with GPS tracking for real-time updates.'],
            ['q' => 'What certifications do you hold?', 'a' => 'We are an ISO-certified transport and construction service provider with industry-leading safety awards.'],
            ['q' => 'Do you provide site consultation?', 'a' => 'Yes, our experts can visit your site to recommend the best machinery and logistics plan for your specific project.'],
            ['q' => 'Are there any hidden charges?', 'a' => 'No, we believe in transparent pricing. All costs are detailed in our quotes before the project starts.'],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::updateOrCreate(['question' => $faq['q']], [
                'answer' => $faq['a'],
                'status' => 1
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\PageContent;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ehsandevelopers.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        // Service Categories & Services
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'icon' => 'globe',
                'color' => '#059669',
                'description' => 'Custom websites and web applications built with modern technologies.',
                'sort_order' => 1,
                'services' => [
                    ['name' => 'Custom Website Development', 'slug' => 'custom-website-development', 'short_description' => 'Bespoke websites tailored to your brand', 'icon' => 'code', 'features' => ['Responsive Design', 'SEO Optimized', 'CMS Integration', 'Custom Functionality']],
                    ['name' => 'E-Commerce Solutions', 'slug' => 'e-commerce-solutions', 'short_description' => 'Online stores that drive sales', 'icon' => 'shopping-cart', 'features' => ['Payment Gateway', 'Inventory Management', 'Order Tracking', 'Analytics']],
                    ['name' => 'Web Application Development', 'slug' => 'web-application-development', 'short_description' => 'Complex web apps for your business', 'icon' => 'layers', 'features' => ['SaaS Platforms', 'Dashboard Systems', 'API Development', 'Real-time Features']],
                    ['name' => 'Landing Page Design', 'slug' => 'landing-page-design', 'short_description' => 'High-converting landing pages', 'icon' => 'layout', 'features' => ['A/B Testing Ready', 'Lead Capture', 'Analytics Integration', 'Fast Loading']],
                ],
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'icon' => 'smartphone',
                'color' => '#D97706',
                'description' => 'Native and cross-platform mobile applications.',
                'sort_order' => 2,
                'services' => [
                    ['name' => 'iOS App Development', 'slug' => 'ios-app-development', 'short_description' => 'Native iOS applications', 'icon' => 'smartphone', 'features' => ['Swift/SwiftUI', 'App Store Optimization', 'Push Notifications', 'In-App Purchases']],
                    ['name' => 'Android App Development', 'slug' => 'android-app-development', 'short_description' => 'Native Android applications', 'icon' => 'smartphone', 'features' => ['Kotlin/Java', 'Material Design', 'Google Play Store', 'Firebase Integration']],
                    ['name' => 'Cross-Platform Apps', 'slug' => 'cross-platform-apps', 'short_description' => 'Flutter & React Native solutions', 'icon' => 'repeat', 'features' => ['Single Codebase', 'Native Performance', 'Hot Reload', 'Platform Widgets']],
                    ['name' => 'App Maintenance & Support', 'slug' => 'app-maintenance-support', 'short_description' => 'Ongoing app support and updates', 'icon' => 'tool', 'features' => ['Bug Fixes', 'Performance Optimization', 'OS Updates', 'Feature Enhancements']],
                ],
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'icon' => 'pen-tool',
                'color' => '#0D9488',
                'description' => 'User-centered design that delights and converts.',
                'sort_order' => 3,
                'services' => [
                    ['name' => 'User Interface Design', 'slug' => 'user-interface-design', 'short_description' => 'Beautiful, intuitive interfaces', 'icon' => 'monitor', 'features' => ['Design Systems', 'Component Libraries', 'Responsive Layouts', 'Accessibility']],
                    ['name' => 'User Experience Design', 'slug' => 'user-experience-design', 'short_description' => 'Research-driven UX strategies', 'icon' => 'users', 'features' => ['User Research', 'Wireframing', 'Prototyping', 'Usability Testing']],
                    ['name' => 'Brand Identity Design', 'slug' => 'brand-identity-design', 'short_description' => 'Logos and brand guidelines', 'icon' => 'aperture', 'features' => ['Logo Design', 'Color Palette', 'Typography', 'Brand Guidelines']],
                    ['name' => 'Graphic Design', 'slug' => 'graphic-design', 'short_description' => 'Visual assets for digital and print', 'icon' => 'image', 'features' => ['Social Media Graphics', 'Marketing Materials', 'Infographics', 'Presentations']],
                ],
            ],
            [
                'name' => 'Cloud & DevOps',
                'slug' => 'cloud-devops',
                'icon' => 'cloud',
                'color' => '#7C3AED',
                'description' => 'Scalable cloud infrastructure and deployment automation.',
                'sort_order' => 4,
                'services' => [
                    ['name' => 'Cloud Architecture', 'slug' => 'cloud-architecture', 'short_description' => 'Scalable cloud solutions', 'icon' => 'cloud', 'features' => ['AWS/Azure/GCP', 'Auto-scaling', 'Load Balancing', 'Disaster Recovery']],
                    ['name' => 'DevOps & CI/CD', 'slug' => 'devops-ci-cd', 'short_description' => 'Automated deployment pipelines', 'icon' => 'git-branch', 'features' => ['Docker/Kubernetes', 'GitHub Actions', 'Monitoring', 'Infrastructure as Code']],
                    ['name' => 'Server Management', 'slug' => 'server-management', 'short_description' => 'Server setup and maintenance', 'icon' => 'server', 'features' => ['Linux Administration', 'Security Hardening', 'Performance Tuning', 'Backup Solutions']],
                    ['name' => 'Database Administration', 'slug' => 'database-administration', 'short_description' => 'Database optimization and management', 'icon' => 'database', 'features' => ['Query Optimization', 'Replication', 'Migration', 'Backup & Recovery']],
                ],
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'icon' => 'trending-up',
                'color' => '#DC2626',
                'description' => 'Data-driven digital marketing strategies.',
                'sort_order' => 5,
                'services' => [
                    ['name' => 'SEO Optimization', 'slug' => 'seo-optimization', 'short_description' => 'Rank higher in search results', 'icon' => 'search', 'features' => ['Technical SEO', 'Content Strategy', 'Link Building', 'Analytics & Reporting']],
                    ['name' => 'Social Media Marketing', 'slug' => 'social-media-marketing', 'short_description' => 'Grow your social presence', 'icon' => 'share-2', 'features' => ['Content Creation', 'Community Management', 'Paid Advertising', 'Analytics']],
                    ['name' => 'Content Marketing', 'slug' => 'content-marketing', 'short_description' => 'Content that engages and converts', 'icon' => 'file-text', 'features' => ['Blog Writing', 'Copywriting', 'Email Marketing', 'Video Content']],
                    ['name' => 'PPC Advertising', 'slug' => 'ppc-advertising', 'short_description' => 'Paid ad campaigns that deliver ROI', 'icon' => 'dollar-sign', 'features' => ['Google Ads', 'Facebook Ads', 'Retargeting', 'Conversion Tracking']],
                ],
            ],
            [
                'name' => 'Consulting & Strategy',
                'slug' => 'consulting-strategy',
                'icon' => 'briefcase',
                'color' => '#0891B2',
                'description' => 'Expert IT consulting and digital transformation.',
                'sort_order' => 6,
                'services' => [
                    ['name' => 'IT Consulting', 'slug' => 'it-consulting', 'short_description' => 'Expert technology guidance', 'icon' => 'compass', 'features' => ['Technology Assessment', 'Digital Strategy', 'Vendor Selection', 'Cost Optimization']],
                    ['name' => 'Digital Transformation', 'slug' => 'digital-transformation', 'short_description' => 'Modernize your business', 'icon' => 'refresh-cw', 'features' => ['Process Automation', 'Legacy Migration', 'Change Management', 'Training']],
                    ['name' => 'Project Management', 'slug' => 'project-management', 'short_description' => 'Expert project delivery', 'icon' => 'clipboard', 'features' => ['Agile/Scrum', 'Resource Planning', 'Risk Management', 'Quality Assurance']],
                    ['name' => 'Technical Training', 'slug' => 'technical-training', 'short_description' => 'Upskill your team', 'icon' => 'book-open', 'features' => ['Custom Curriculum', 'Hands-on Workshops', 'Certification Prep', 'Mentoring']],
                ],
            ],
        ];

        foreach ($categories as $catData) {
            $services = $catData['services'];
            unset($catData['services']);
            $category = ServiceCategory::create($catData);

            foreach ($services as $i => $serviceData) {
                $serviceData['service_category_id'] = $category->id;
                $serviceData['sort_order'] = $i + 1;
                $serviceData['features'] = json_encode($serviceData['features']);
                Service::create($serviceData);
            }
        }

        // Page Content
        $contents = [
            // Hero
            ['section' => 'hero', 'key' => 'headline', 'value' => 'Building Digital Excellence', 'type' => 'text', 'label' => 'Hero Headline'],
            ['section' => 'hero', 'key' => 'subtitle', 'value' => 'We craft premium digital solutions that drive growth, elevate brands, and transform businesses through innovative technology.', 'type' => 'textarea', 'label' => 'Hero Subtitle'],
            ['section' => 'hero', 'key' => 'cta_primary_text', 'value' => 'Start Your Project', 'type' => 'text', 'label' => 'Primary CTA Text'],
            ['section' => 'hero', 'key' => 'cta_secondary_text', 'value' => 'View Our Services', 'type' => 'text', 'label' => 'Secondary CTA Text'],
            // About
            ['section' => 'about', 'key' => 'vision', 'value' => 'To be the leading force in digital innovation, empowering businesses worldwide with transformative technology solutions.', 'type' => 'textarea', 'label' => 'Vision Statement'],
            ['section' => 'about', 'key' => 'mission', 'value' => 'We deliver exceptional digital experiences by combining cutting-edge technology with creative excellence, ensuring every project exceeds expectations.', 'type' => 'textarea', 'label' => 'Mission Statement'],
            ['section' => 'about', 'key' => 'values', 'value' => 'Innovation, Excellence, Integrity, Collaboration, Client-First Approach', 'type' => 'textarea', 'label' => 'Core Values'],
            // CTA Banner
            ['section' => 'cta', 'key' => 'headline', 'value' => 'Ready to Transform Your Digital Presence?', 'type' => 'text', 'label' => 'CTA Headline'],
            ['section' => 'cta', 'key' => 'subtitle', 'value' => 'Let\'s discuss how we can help you achieve your business goals with the right technology solutions.', 'type' => 'textarea', 'label' => 'CTA Subtitle'],
            // Contact
            ['section' => 'contact', 'key' => 'email', 'value' => 'info@ehsandevelopers.com', 'type' => 'text', 'label' => 'Contact Email'],
            ['section' => 'contact', 'key' => 'phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'label' => 'Contact Phone'],
            ['section' => 'contact', 'key' => 'address', 'value' => '123 Innovation Drive, Tech City, TC 10001', 'type' => 'textarea', 'label' => 'Office Address'],
            ['section' => 'contact', 'key' => 'working_hours', 'value' => 'Mon - Fri: 9:00 AM - 6:00 PM', 'type' => 'text', 'label' => 'Working Hours'],
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }

        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Ehsan Developers', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Building Digital Excellence', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Premium IT solutions company specializing in web development, mobile apps, UI/UX design, cloud services, and digital marketing.', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'site_keywords', 'value' => 'web development, mobile apps, UI/UX design, cloud services, digital marketing, IT consulting', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'admin_email', 'value' => 'admin@ehsandevelopers.com', 'type' => 'text', 'group' => 'email'],
            ['key' => 'notification_email', 'value' => 'notifications@ehsandevelopers.com', 'type' => 'text', 'group' => 'email'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/ehsandevelopers', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/ehsandevs', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/ehsandevelopers', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_github', 'value' => 'https://github.com/ehsandevelopers', 'type' => 'text', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}

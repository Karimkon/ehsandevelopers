<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Get category IDs by slug
        $categories = ServiceCategory::pluck('id', 'slug');

        // Clear existing services (disable FK checks for truncate)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Service::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $services = [
            [
                'name' => 'Website Development',
                'slug' => 'website-development',
                'short_description' => 'Custom websites, web applications, CMS platforms, and landing pages built with modern frameworks.',
                'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                'service_category_id' => $categories['web-development'] ?? 1,
                'description' => '<h2>Professional Website Development</h2>
<p>Your website is often the first impression potential clients have of your business. We craft stunning, high-performance websites that not only look beautiful but drive real business results.</p>

<h3>Our Approach</h3>
<p>We follow a user-centered design process, starting with understanding your business goals and target audience. Every website we build is mobile-responsive, SEO-optimized, and built for speed.</p>

<h3>Technologies We Use</h3>
<p>We work with modern frameworks and technologies including Laravel, React, Next.js, Vue.js, and WordPress. Whether you need a simple brochure site or a complex web application, we have the expertise to deliver.</p>

<h3>What You Get</h3>
<p>Every project includes responsive design, cross-browser testing, basic SEO setup, analytics integration, and a content management system so you can update your site independently. We also provide 30 days of post-launch support to ensure everything runs smoothly.</p>',
                'features' => [
                    'Responsive, mobile-first design',
                    'SEO-optimized structure and metadata',
                    'Content Management System (CMS)',
                    'Cross-browser compatibility testing',
                    'Performance optimization & fast loading',
                    'Analytics & tracking integration',
                    'SSL certificate setup',
                    '30-day post-launch support',
                ],
            ],
            [
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'short_description' => 'Native & cross-platform mobile apps for iOS and Android using Flutter, React Native, Swift & Kotlin.',
                'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                'service_category_id' => $categories['mobile-development'] ?? 2,
                'description' => '<h2>Mobile App Development</h2>
<p>Reach your audience wherever they are with a beautifully designed, high-performance mobile application. We build apps that users love to use and keep coming back to.</p>

<h3>Cross-Platform & Native Development</h3>
<p>We specialize in Flutter for cross-platform development, allowing you to launch on both iOS and Android from a single codebase — reducing cost and time to market. For projects that demand maximum platform-specific performance, we also build native apps using Swift/SwiftUI for iOS and Kotlin for Android.</p>

<h3>End-to-End Service</h3>
<p>From initial concept and UX research through design, development, testing, and app store submission, we handle the entire lifecycle. We also build the backend APIs and admin dashboards needed to power your app.</p>

<h3>Post-Launch Growth</h3>
<p>Our partnership doesn\'t end at launch. We provide ongoing maintenance, performance monitoring, crash reporting, and feature updates to help your app grow and retain users over time.</p>',
                'features' => [
                    'iOS & Android from a single codebase (Flutter)',
                    'Native development (Swift, Kotlin) when needed',
                    'UI/UX design and prototyping',
                    'Backend API development',
                    'Push notifications & real-time features',
                    'App Store & Play Store submission',
                    'Crash reporting & analytics integration',
                    'Ongoing maintenance & updates',
                ],
            ],
            [
                'name' => 'Custom Software',
                'slug' => 'custom-software',
                'short_description' => 'Enterprise software, SaaS platforms, workflow automation, and bespoke systems for your operations.',
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'service_category_id' => $categories['web-development'] ?? 1,
                'description' => '<h2>Custom Software Development</h2>
<p>Off-the-shelf software doesn\'t always fit. We build custom solutions tailored precisely to your business processes, giving you a competitive edge through technology that works exactly the way you need it to.</p>

<h3>Enterprise Solutions</h3>
<p>We develop robust enterprise applications that streamline operations, improve collaboration, and reduce manual work. From inventory management systems to HR platforms, CRM tools to project management suites — we build software that scales with your business.</p>

<h3>SaaS Platforms</h3>
<p>Looking to launch your own software-as-a-service product? We handle architecture design, multi-tenant infrastructure, subscription billing, user management, and all the complexities of building a reliable SaaS platform.</p>

<h3>Workflow Automation</h3>
<p>Eliminate repetitive tasks and reduce errors with intelligent workflow automation. We integrate your existing tools and build custom automations that save your team hours every week.</p>',
                'features' => [
                    'Requirements analysis & system design',
                    'Scalable architecture for growth',
                    'Multi-tenant SaaS infrastructure',
                    'Workflow automation & integrations',
                    'Role-based access control',
                    'Reporting & analytics dashboards',
                    'API integrations with existing tools',
                    'Comprehensive documentation & training',
                ],
            ],
            [
                'name' => 'E-Commerce Solutions',
                'slug' => 'e-commerce-solutions',
                'short_description' => 'Full-featured online stores with M-Pesa, Stripe, inventory management & analytics dashboards.',
                'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z',
                'service_category_id' => $categories['web-development'] ?? 1,
                'description' => '<h2>E-Commerce Solutions</h2>
<p>Launch your online store with a platform built to convert visitors into customers. We create e-commerce experiences that are fast, secure, and designed for growth.</p>

<h3>Payment Integration</h3>
<p>We integrate with all major payment providers including M-Pesa, Stripe, PayPal, and local payment gateways. Your customers can pay the way they prefer, with secure, PCI-compliant transaction processing.</p>

<h3>Inventory & Order Management</h3>
<p>Stay on top of your stock with real-time inventory tracking, automated low-stock alerts, and streamlined order management. From order placement to delivery tracking, every step is handled.</p>

<h3>Analytics & Growth</h3>
<p>Built-in analytics dashboards give you insight into sales trends, customer behavior, conversion rates, and more. Make data-driven decisions to grow your online business.</p>',
                'features' => [
                    'M-Pesa, Stripe & PayPal integration',
                    'Real-time inventory management',
                    'Order tracking & notifications',
                    'Product catalog with variants & categories',
                    'Discount codes & promotions engine',
                    'Customer accounts & wishlists',
                    'Sales analytics dashboard',
                    'Mobile-optimized shopping experience',
                ],
            ],
            [
                'name' => 'Cloud & DevOps',
                'slug' => 'cloud-devops',
                'short_description' => 'AWS, Azure, Google Cloud deployment, CI/CD pipelines, Docker, Kubernetes & infrastructure automation.',
                'icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                'service_category_id' => $categories['cloud-devops'] ?? 4,
                'description' => '<h2>Cloud & DevOps Services</h2>
<p>Modernize your infrastructure with cloud-native architectures and automated deployment pipelines. We help you move faster, scale effortlessly, and reduce operational costs.</p>

<h3>Cloud Migration & Architecture</h3>
<p>Whether you\'re migrating from on-premises servers or optimizing an existing cloud setup, we design architectures on AWS, Azure, or Google Cloud that are secure, scalable, and cost-efficient.</p>

<h3>CI/CD Pipelines</h3>
<p>Ship code with confidence. We set up continuous integration and continuous deployment pipelines that automate testing, building, and deploying your applications — reducing human error and speeding up delivery.</p>

<h3>Containerization & Orchestration</h3>
<p>We containerize your applications with Docker and orchestrate them with Kubernetes, ensuring consistent environments from development to production and seamless horizontal scaling.</p>',
                'features' => [
                    'AWS, Azure & Google Cloud setup',
                    'CI/CD pipeline automation',
                    'Docker containerization',
                    'Kubernetes orchestration',
                    'Infrastructure as Code (Terraform)',
                    'Monitoring & alerting (Prometheus, Grafana)',
                    'Auto-scaling & load balancing',
                    'Cost optimization & resource management',
                ],
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'short_description' => 'User research, wireframing, prototyping & pixel-perfect interfaces that delight users.',
                'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01',
                'service_category_id' => $categories['ui-ux-design'] ?? 3,
                'description' => '<h2>UI/UX Design Services</h2>
<p>Great design isn\'t just about aesthetics — it\'s about creating intuitive experiences that help users accomplish their goals effortlessly. We design interfaces that are both beautiful and functional.</p>

<h3>User Research & Strategy</h3>
<p>Every project begins with understanding your users. We conduct user interviews, competitive analysis, and persona development to ensure our designs are grounded in real user needs, not assumptions.</p>

<h3>Wireframing & Prototyping</h3>
<p>Before writing a single line of code, we create wireframes and interactive prototypes that let you see and test the user flow. This iterative process ensures we get the experience right before development begins.</p>

<h3>Visual Design & Design Systems</h3>
<p>We create pixel-perfect, on-brand visual designs and comprehensive design systems that ensure consistency across every screen and interaction. Your product will look polished and professional on every device.</p>',
                'features' => [
                    'User research & persona development',
                    'Information architecture & user flows',
                    'Wireframing & low-fidelity prototypes',
                    'Interactive high-fidelity prototypes',
                    'Visual design & brand alignment',
                    'Design system & component library',
                    'Usability testing & iteration',
                    'Developer handoff with specifications',
                ],
            ],
            [
                'name' => 'Cybersecurity',
                'slug' => 'cybersecurity',
                'short_description' => 'Security audits, vulnerability assessments, penetration testing, SSL & compliance solutions.',
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'service_category_id' => $categories['cloud-devops'] ?? 4,
                'description' => '<h2>Cybersecurity Services</h2>
<p>Protect your business from digital threats with comprehensive cybersecurity solutions. In today\'s landscape, a single breach can cost millions — we help you stay secure and compliant.</p>

<h3>Security Audits & Assessments</h3>
<p>We conduct thorough security audits of your applications, infrastructure, and processes. Our assessments identify vulnerabilities before attackers can exploit them, providing you with a clear roadmap to strengthen your defenses.</p>

<h3>Penetration Testing</h3>
<p>Our ethical hacking team simulates real-world attacks against your systems to find weaknesses. We test web applications, APIs, networks, and mobile apps, providing detailed reports with prioritized remediation steps.</p>

<h3>Compliance & Best Practices</h3>
<p>We help you meet industry compliance standards and implement security best practices across your organization, from SSL/TLS configuration to data encryption and access control policies.</p>',
                'features' => [
                    'Application security audits',
                    'Vulnerability assessment & scanning',
                    'Penetration testing (web, API, mobile)',
                    'SSL/TLS configuration & hardening',
                    'Security policy development',
                    'Data encryption implementation',
                    'Compliance consulting (GDPR, PCI-DSS)',
                    'Incident response planning',
                ],
            ],
            [
                'name' => 'IT Consulting',
                'slug' => 'it-consulting',
                'short_description' => 'Digital transformation strategy, technology audits, system architecture & expert advisory.',
                'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'service_category_id' => $categories['consulting-strategy'] ?? 6,
                'description' => '<h2>IT Consulting & Strategy</h2>
<p>Make smarter technology decisions with expert guidance. Our consultants bring deep industry experience to help you navigate digital transformation, optimize your tech stack, and align IT with business goals.</p>

<h3>Digital Transformation</h3>
<p>We help organizations modernize their technology landscape — from legacy system migration to cloud adoption, process digitization, and building a culture of innovation. Our roadmaps are practical, phased, and aligned with your budget.</p>

<h3>Technology Audits</h3>
<p>Is your current tech stack holding you back? We conduct comprehensive technology audits that evaluate your systems, identify inefficiencies, and recommend improvements that deliver measurable ROI.</p>

<h3>System Architecture</h3>
<p>Whether you\'re building from scratch or re-architecting existing systems, we design scalable, maintainable architectures that support your business today and grow with you tomorrow.</p>',
                'features' => [
                    'Digital transformation roadmaps',
                    'Technology stack evaluation & audit',
                    'System architecture design',
                    'Vendor selection & assessment',
                    'IT budget planning & optimization',
                    'Team structure & hiring advisory',
                    'Process improvement & automation strategy',
                    'Ongoing strategic advisory',
                ],
            ],
            [
                'name' => 'API Development',
                'slug' => 'api-development',
                'short_description' => 'RESTful & GraphQL APIs, third-party integrations, payment gateways & microservices architecture.',
                'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'service_category_id' => $categories['web-development'] ?? 1,
                'description' => '<h2>API Development & Integration</h2>
<p>Connect your systems, enable third-party integrations, and build the backbone of modern applications with well-designed, reliable APIs.</p>

<h3>RESTful & GraphQL APIs</h3>
<p>We design and build APIs that are intuitive, well-documented, and performant. Whether you need RESTful endpoints or the flexibility of GraphQL, we follow industry best practices for authentication, versioning, and error handling.</p>

<h3>Third-Party Integrations</h3>
<p>Need to connect with payment gateways, CRMs, ERPs, social media platforms, or other services? We build robust integrations that keep your data flowing seamlessly between systems.</p>

<h3>Microservices Architecture</h3>
<p>For complex applications, we design microservices architectures that allow independent scaling, deployment, and development of each service. This approach improves reliability and enables your teams to work more efficiently.</p>',
                'features' => [
                    'RESTful API design & development',
                    'GraphQL API implementation',
                    'API documentation (OpenAPI/Swagger)',
                    'Authentication (OAuth 2.0, JWT)',
                    'Payment gateway integration (M-Pesa, Stripe)',
                    'Third-party service integrations',
                    'Microservices architecture',
                    'Rate limiting & API monitoring',
                ],
            ],
            [
                'name' => 'Digital Marketing & SEO',
                'slug' => 'digital-marketing-seo',
                'short_description' => 'Search engine optimization, social media marketing, content strategy & analytics-driven campaigns.',
                'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
                'service_category_id' => $categories['digital-marketing'] ?? 5,
                'description' => '<h2>Digital Marketing & SEO</h2>
<p>Drive qualified traffic, increase conversions, and grow your online presence with data-driven digital marketing strategies. We help you reach the right audience at the right time.</p>

<h3>Search Engine Optimization</h3>
<p>We implement comprehensive SEO strategies covering technical SEO, on-page optimization, content strategy, and link building. Our goal is sustainable organic growth that brings you consistent, high-quality traffic.</p>

<h3>Social Media Marketing</h3>
<p>Build your brand presence across social platforms with strategic content creation, community management, and paid social campaigns. We help you engage your audience and turn followers into customers.</p>

<h3>Analytics & Performance</h3>
<p>Every decision we make is backed by data. We set up comprehensive tracking, create custom dashboards, and provide regular reports so you can see exactly how your marketing investment is performing.</p>',
                'features' => [
                    'Technical SEO audit & optimization',
                    'Keyword research & content strategy',
                    'On-page & off-page SEO',
                    'Social media management & campaigns',
                    'Google Ads & paid search management',
                    'Email marketing automation',
                    'Conversion rate optimization',
                    'Analytics dashboards & monthly reporting',
                ],
            ],
            [
                'name' => 'AI & Machine Learning',
                'slug' => 'ai-machine-learning',
                'short_description' => 'Chatbots, predictive analytics, recommendation engines, NLP & intelligent automation.',
                'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'service_category_id' => $categories['consulting-strategy'] ?? 6,
                'description' => '<h2>AI & Machine Learning Solutions</h2>
<p>Harness the power of artificial intelligence to automate processes, gain deeper insights, and create intelligent experiences for your users. We make AI practical and accessible for businesses of all sizes.</p>

<h3>Chatbots & Conversational AI</h3>
<p>Deploy intelligent chatbots that handle customer inquiries 24/7, qualify leads, and provide instant support. Our chatbots integrate with your existing systems and learn from interactions to improve over time.</p>

<h3>Predictive Analytics</h3>
<p>Turn your data into foresight. We build predictive models that help you forecast demand, identify risks, optimize pricing, and make better business decisions based on patterns in your data.</p>

<h3>Recommendation & NLP</h3>
<p>From product recommendations that boost sales to natural language processing that understands customer sentiment, we implement AI solutions that deliver measurable business value.</p>',
                'features' => [
                    'AI chatbot development & deployment',
                    'Predictive analytics & forecasting models',
                    'Recommendation engine development',
                    'Natural Language Processing (NLP)',
                    'Computer vision solutions',
                    'Process automation with AI',
                    'Data pipeline & model training',
                    'Integration with existing systems',
                ],
            ],
            [
                'name' => 'Database & Infrastructure',
                'slug' => 'database-infrastructure',
                'short_description' => 'Database design, optimization, migration, server management & scalable infrastructure.',
                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                'service_category_id' => $categories['cloud-devops'] ?? 4,
                'description' => '<h2>Database & Infrastructure Services</h2>
<p>Build a solid foundation for your applications with expertly designed databases and reliable infrastructure. Performance, security, and scalability are at the core of everything we set up.</p>

<h3>Database Design & Optimization</h3>
<p>We design database schemas that are normalized, efficient, and optimized for your specific query patterns. For existing databases, we identify and fix performance bottlenecks — slow queries, missing indexes, and inefficient structures.</p>

<h3>Migration Services</h3>
<p>Moving between database systems or upgrading versions? We handle complex migrations with zero data loss and minimal downtime, whether you\'re going from MySQL to PostgreSQL, on-premises to cloud, or scaling to distributed databases.</p>

<h3>Server Management</h3>
<p>We set up, configure, and manage your server infrastructure for optimal performance and security. From Linux server hardening to automated backups and disaster recovery planning, we ensure your infrastructure is rock-solid.</p>',
                'features' => [
                    'Database schema design & normalization',
                    'Query optimization & performance tuning',
                    'Database migration (zero-downtime)',
                    'Automated backup & disaster recovery',
                    'Server setup & configuration',
                    'Linux server hardening & security',
                    'Monitoring & uptime management',
                    'Scalability planning & implementation',
                ],
            ],
        ];

        foreach ($services as $index => $service) {
            Service::create(array_merge($service, [
                'sort_order' => $index + 1,
                'is_active' => true,
            ]));
        }
    }
}

<x-layouts.app>
    <x-slot:title>FAQ - Ehsan Developers</x-slot:title>
    <x-slot:metaDescription>Frequently asked questions about Ehsan Developers' services, pricing, process, and support.</x-slot:metaDescription>

    <section class="pt-28 pb-20 bg-slate-50 dark:bg-surface-800 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-hero-animate>
                    <span class="w-8 h-[2px] bg-primary-500"></span> FAQ <span class="w-8 h-[2px] bg-primary-500"></span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-hero-animate>
                    Frequently Asked <span class="gradient-text">Questions</span>
                </h1>
                <p class="text-lg text-slate-600 dark:text-gray-400 max-w-2xl mx-auto" data-hero-animate>
                    Everything you need to know about working with Ehsan Developers. Can't find the answer you're looking for? <a href="{{ url('/#contact') }}" class="text-primary-600 dark:text-primary-400 hover:underline">Reach out to us</a>.
                </p>
            </div>

            <!-- Accordion -->
            <div class="space-y-4" x-data="{ openItem: null }">
                @foreach([
                    [
                        'q' => 'How long does a typical project take?',
                        'a' => 'Project timelines vary based on complexity and scope. A simple website typically takes 1-4 days, while a custom web application may take 1-2 months. Mobile apps usually require 3-6 months for both platforms. During the discovery phase, we provide a detailed timeline with milestones so you know exactly what to expect.',
                    ],
                    [
                        'q' => 'How much does it cost to build a website or app?',
                        'a' => 'Our pricing depends on the scope, features, and complexity of your project. Simple websites start at $500, multi-page business sites from $1,000, custom web applications from $5,000, and enterprise solutions are quoted individually. We offer both fixed-price and time-and-materials contracts. Visit our pricing section for detailed plans, or contact us for a free quote.',
                    ],
                    [
                        'q' => 'What is your development process?',
                        'a' => 'We follow an Agile/Scrum methodology with 2-week sprints. The process starts with a discovery and planning phase where we understand your requirements. Then we move to design, development, testing, and deployment. Throughout the project, you receive regular updates, demos, and have direct access to your project team.',
                    ],
                    [
                        'q' => 'What technologies do you use?',
                        'a' => 'We use modern, proven technologies including Laravel and PHP for backend development, React and Vue.js for frontend, Flutter for cross-platform mobile apps, MySQL and PostgreSQL for databases, and AWS/DigitalOcean for cloud hosting. We choose the best tech stack based on your specific project needs.',
                    ],
                    [
                        'q' => 'How do we communicate during the project?',
                        'a' => 'We use a combination of tools to keep communication seamless: Slack or WhatsApp for daily messaging, email for formal updates, video calls for weekly sprint reviews, and a project management tool (Jira or Trello) for task tracking. You will always have a dedicated project manager as your single point of contact.',
                    ],
                    [
                        'q' => 'Do you provide support after the project is delivered?',
                        'a' => 'Yes. All our plans include a free post-launch support period (1-6 months depending on the plan). After that, we offer ongoing maintenance and support packages starting at $200/month, covering bug fixes, security updates, performance monitoring, and feature enhancements.',
                    ],
                    [
                        'q' => 'How many revisions are included?',
                        'a' => 'During the design phase, we include up to 3 rounds of revisions to ensure you are completely satisfied with the look and feel. During development, changes within the agreed scope are handled through our sprint process. Any significant scope changes are discussed and quoted separately to maintain project quality and timeline.',
                    ],
                    [
                        'q' => 'Do you sign NDAs and maintain confidentiality?',
                        'a' => 'Absolutely. We take confidentiality seriously and are happy to sign a Non-Disclosure Agreement (NDA) before any project discussions. All client data, business logic, and proprietary information are treated with strict confidentiality. Our team follows secure development practices and access controls.',
                    ],
                    [
                        'q' => 'Can you work with our existing team or codebase?',
                        'a' => 'Yes. We frequently collaborate with in-house teams and can integrate seamlessly into your existing workflow. Whether you need us to take over a legacy codebase, augment your team with additional developers, or work alongside your designers, we are flexible and experienced in team collaboration.',
                    ],
                    [
                        'q' => 'What happens if I need to pause or cancel a project?',
                        'a' => 'We understand that business priorities can change. For fixed-price projects, payment is milestone-based — you only pay for completed work. For time-and-materials contracts, you can pause or stop at any time with reasonable notice. All code, designs, and documentation produced up to that point are yours.',
                    ],
                    [
                        'q' => 'Do you help with hosting and domain setup?',
                        'a' => 'Yes. We can set up and manage your hosting environment on AWS, DigitalOcean, or other cloud providers. We also assist with domain registration, SSL certificate installation, DNS configuration, and email setup. Ongoing server management and monitoring packages are available.',
                    ],
                    [
                        'q' => 'How do I get started?',
                        'a' => 'Getting started is simple. Reach out to us through our contact form, email, or phone. We will schedule a free consultation call to understand your requirements, goals, and budget. From there, we provide a detailed proposal with scope, timeline, and pricing. Once approved, we kick off the project immediately.',
                    ],
                ] as $i => $faq)
                <div class="glass-card rounded-xl overflow-hidden" data-reveal>
                    <button
                        @click="openItem = openItem === {{ $i }} ? null : {{ $i }}"
                        class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 dark:hover:bg-surface-700 transition-colors"
                    >
                        <span class="text-base font-display font-semibold text-slate-800 dark:text-white pr-4">{{ $faq['q'] }}</span>
                        <svg
                            class="w-5 h-5 text-primary-500 flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': openItem === {{ $i }} }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div
                        x-show="openItem === {{ $i }}"
                        x-collapse
                        x-cloak
                    >
                        <div class="px-6 pb-6 text-slate-600 dark:text-gray-400 leading-relaxed">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- CTA -->
            <div class="text-center mt-16" data-reveal>
                <p class="text-slate-600 dark:text-gray-400 mb-6">Still have questions? We'd love to hear from you.</p>
                <a href="{{ url('/#contact') }}" class="btn-primary">Contact Us</a>
            </div>
        </div>
    </section>
</x-layouts.app>

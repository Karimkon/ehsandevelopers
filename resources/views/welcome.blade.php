<x-layouts.app>
<x-slot:title>Ehsan Developers - Innovative Digital Solutions | Web, Mobile & Software</x-slot:title>
<x-slot:metaDescription>Ehsan Developers builds premium websites, mobile apps, and custom software. Get expert digital solutions starting from $500. Free consultation available.</x-slot:metaDescription>

{{-- JSON-LD Structured Data for SEO --}}
<script type="application/ld+json">
@php
echo json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'Organization',
    'name' => 'Ehsan Developers',
    'url' => url('/'),
    'logo' => asset('images/ehsandeveloperslogo.jpeg'),
    'description' => 'Premium IT solutions company specializing in web development, mobile apps, and custom software.',
    'contactPoint' => [
        '@@type' => 'ContactPoint',
        'contactType' => 'sales',
        'availableLanguage' => ['English'],
    ],
    'sameAs' => [],
    'offers' => [
        '@@type' => 'AggregateOffer',
        'priceCurrency' => 'USD',
        'lowPrice' => '500',
        'highPrice' => '15000',
        'offerCount' => '5',
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
@endphp
</script>

{{-- Tailwind JIT safelist (dynamic color classes used in @foreach loops):
bg-primary-100 bg-blue-100 bg-purple-100 bg-amber-100 bg-cyan-100 bg-pink-100 bg-red-100 bg-indigo-100 bg-orange-100 bg-emerald-100 bg-violet-100 bg-teal-100
dark:bg-primary-900/40 dark:bg-blue-900/40 dark:bg-purple-900/40 dark:bg-amber-900/40 dark:bg-cyan-900/40 dark:bg-pink-900/40 dark:bg-red-900/40 dark:bg-indigo-900/40 dark:bg-orange-900/40 dark:bg-emerald-900/40 dark:bg-violet-900/40 dark:bg-teal-900/40
text-primary-600 text-blue-600 text-purple-600 text-amber-600 text-cyan-600 text-pink-600 text-red-600 text-indigo-600 text-orange-600 text-emerald-600 text-violet-600 text-teal-600
dark:text-primary-400 dark:text-blue-400 dark:text-purple-400 dark:text-amber-400 dark:text-cyan-400 dark:text-pink-400 dark:text-red-400 dark:text-indigo-400 dark:text-orange-400 dark:text-emerald-400 dark:text-violet-400 dark:text-teal-400
bg-primary-50/50 dark:bg-primary-900/20 bg-primary-100 dark:bg-primary-900/50 border-primary-100 dark:border-primary-900/30
bg-secondary-50/50 dark:bg-secondary-900/20 bg-secondary-100 dark:bg-secondary-900/50 border-secondary-100 dark:border-secondary-900/30
bg-teal-50/50 dark:bg-teal-900/20 bg-teal-100 dark:bg-teal-900/50 border-teal-100 dark:border-teal-900/30
bg-purple-50/50 dark:bg-purple-900/20 bg-purple-100 dark:bg-purple-900/50 border-purple-100 dark:border-purple-900/30
text-secondary-600 dark:text-secondary-400 text-teal-600 dark:text-teal-400 text-purple-600 dark:text-purple-400
--}}

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- PAGE STYLES                                                    --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<style>
#particle-canvas{position:absolute;inset:0;z-index:1;pointer-events:none}
.typing-cursor{display:inline-block;width:3px;height:1.1em;background:currentColor;margin-left:2px;animation:blink 1s step-end infinite;vertical-align:text-bottom}
@keyframes blink{0%,100%{opacity:1}50%{opacity:0}}
.float-slow{animation:fs 8s ease-in-out infinite}
.float-med{animation:fm 6s ease-in-out infinite}
.float-fast{animation:ff 4s ease-in-out infinite}
@keyframes fs{0%,100%{transform:translateY(0) rotate(0)}50%{transform:translateY(-20px) rotate(5deg)}}
@keyframes fm{0%,100%{transform:translateY(0) rotate(0)}50%{transform:translateY(-15px) rotate(-3deg)}}
@keyframes ff{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
.marquee-track{display:flex;width:max-content;animation:mq 35s linear infinite}
@keyframes mq{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.service-card{transition:transform .4s cubic-bezier(.4,0,.2,1),box-shadow .4s}
.service-card:hover{transform:translateY(-10px)}
.service-card:hover .s-icon{background:linear-gradient(135deg,#059669,#0d9488)!important}
.service-card:hover .s-icon svg{stroke:#fff!important}
.service-card:hover .s-arrow{transform:translateX(4px);opacity:1}
.s-arrow{transition:transform .3s,opacity .3s;opacity:0}
.scroll-ind{animation:sb 2s ease-in-out infinite}
@keyframes sb{0%,20%,50%,80%,100%{transform:translateY(0) translateX(-50%)}40%{transform:translateY(-12px) translateX(-50%)}60%{transform:translateY(-6px) translateX(-50%)}}
.stat-card{transition:transform .3s,box-shadow .3s}
.stat-card:hover{transform:translateY(-4px);box-shadow:0 0 30px rgba(5,150,105,.15)}
.portfolio-card img{transition:transform .6s cubic-bezier(.4,0,.2,1)}
.portfolio-card:hover img{transform:scale(1.08)}
.portfolio-card .p-overlay{opacity:0;transition:opacity .4s}
.portfolio-card:hover .p-overlay{opacity:1}
@property --angle{syntax:'<angle>';initial-value:0deg;inherits:false}
.glow-border{position:relative}
.glow-border::before{content:'';position:absolute;inset:-2px;border-radius:inherit;padding:2px;background:conic-gradient(from var(--angle),#059669,#d97706,#0d9488,#f59e0b,#059669);-webkit-mask:linear-gradient(#fff 0 0) content-box,linear-gradient(#fff 0 0);-webkit-mask-composite:xor;mask-composite:exclude;animation:rb 4s linear infinite;opacity:0;transition:opacity .4s;pointer-events:none}
.glow-border:hover::before{opacity:1}
@keyframes rb{to{--angle:360deg}}
.tech-logo{transition:transform .3s,filter .3s;filter:grayscale(.5) opacity(.7)}
.tech-logo:hover{transform:translateY(-4px) scale(1.05);filter:grayscale(0) opacity(1)}
.stagger>*{opacity:0;transform:translateY(30px)}
.stagger.revealed>*{opacity:1;transform:translateY(0);transition:opacity .5s,transform .5s}
.stagger.revealed>*:nth-child(1){transition-delay:.05s}
.stagger.revealed>*:nth-child(2){transition-delay:.1s}
.stagger.revealed>*:nth-child(3){transition-delay:.15s}
.stagger.revealed>*:nth-child(4){transition-delay:.2s}
.stagger.revealed>*:nth-child(5){transition-delay:.25s}
.stagger.revealed>*:nth-child(6){transition-delay:.3s}
.stagger.revealed>*:nth-child(7){transition-delay:.35s}
.stagger.revealed>*:nth-child(8){transition-delay:.4s}
.stagger.revealed>*:nth-child(9){transition-delay:.45s}
.stagger.revealed>*:nth-child(10){transition-delay:.5s}
.stagger.revealed>*:nth-child(11){transition-delay:.55s}
.stagger.revealed>*:nth-child(12){transition-delay:.6s}
.counter-ring{stroke-dasharray:283;stroke-dashoffset:283;transition:stroke-dashoffset 2s ease}
</style>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 1. HERO                                                        --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center pt-32 lg:pt-36 overflow-hidden bg-gradient-to-br from-slate-50 via-primary-50/30 to-teal-50/20 dark:from-surface-900 dark:via-surface-900 dark:to-primary-950/50">
    <canvas id="particle-canvas"></canvas>
    <!-- Orbs -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-primary-400/20 dark:bg-primary-500/10 rounded-full blur-3xl float-slow"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-secondary-400/15 dark:bg-secondary-500/10 rounded-full blur-3xl float-med"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-teal-400/10 dark:bg-teal-500/5 rounded-full blur-3xl"></div>
    <!-- Floating shapes -->
    <div class="absolute top-32 right-[15%] w-16 h-16 border-2 border-primary-300/30 dark:border-primary-500/20 rounded-xl float-med hidden lg:block" style="animation-delay:-2s"></div>
    <div class="absolute bottom-32 left-[10%] w-10 h-10 bg-secondary-400/20 dark:bg-secondary-500/15 rounded-full float-fast hidden lg:block" style="animation-delay:-1s"></div>
    <div class="absolute top-[40%] right-[8%] w-6 h-6 bg-primary-500/30 dark:bg-primary-400/20 rounded rotate-45 float-slow hidden lg:block" style="animation-delay:-3s"></div>
    <div class="absolute top-[25%] left-[5%] w-12 h-12 border border-teal-300/25 dark:border-teal-500/15 rounded-full float-fast hidden lg:block" style="animation-delay:-4s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-20 lg:pt-4 lg:pb-0 w-full">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-primary-100/80 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-4 py-2 rounded-full text-sm font-medium mb-6 backdrop-blur-sm" data-hero-animate>
                    <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse-soft"></span>
                    Innovative Digital Solutions
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-display font-bold text-slate-900 dark:text-white leading-[1.1] mb-6" data-hero-animate>
                    We Build
                    <span class="gradient-text block mt-1">Digital Experiences</span>
                    <span class="block mt-1">That Matter</span>
                </h1>
                <div class="text-lg sm:text-xl text-slate-600 dark:text-gray-400 mb-4 h-8" data-hero-animate>
                    <span>Specialists in </span>
                    <span class="text-primary-600 dark:text-primary-400 font-semibold" x-data="{
                        t:['Website Development','Mobile Applications','Custom Software','E-Commerce Solutions','Cloud & DevOps','UI/UX Design'],
                        i:0,d:'',c:0,del:false,
                        init(){this.go()},
                        go(){const s=this.t[this.i];if(!this.del){this.d=s.substring(0,++this.c);if(this.c===s.length){setTimeout(()=>{this.del=true;this.go()},2200);return}setTimeout(()=>this.go(),80)}else{this.d=s.substring(0,--this.c);if(this.c===0){this.del=false;this.i=(this.i+1)%this.t.length}setTimeout(()=>this.go(),40)}}
                    }" x-text="d"></span><span class="typing-cursor text-primary-500"></span>
                </div>
                <p class="text-slate-500 dark:text-gray-500 mb-8 max-w-lg mx-auto lg:mx-0" data-hero-animate>
                    From concept to deployment, we craft premium digital solutions that drive growth, engage users, and transform businesses across East Africa and beyond.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start" data-hero-animate>
                    <a href="{{ url('/request-service') }}" class="btn-primary text-base px-8 py-4 gap-2 group">
                        Start Your Project
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="#services" class="btn-outline text-base px-8 py-4 gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        Explore Services
                    </a>
                </div>
                <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-gray-200/50 dark:border-surface-600/50" data-hero-animate>
                    <div><div class="text-2xl lg:text-3xl font-display font-bold text-slate-900 dark:text-white">200<span class="text-primary-500">+</span></div><div class="text-sm text-slate-500 dark:text-gray-500">Projects</div></div>
                    <div><div class="text-2xl lg:text-3xl font-display font-bold text-slate-900 dark:text-white">150<span class="text-primary-500">+</span></div><div class="text-sm text-slate-500 dark:text-gray-500">Clients</div></div>
                    <div><div class="text-2xl lg:text-3xl font-display font-bold text-slate-900 dark:text-white">99.9<span class="text-primary-500">%</span></div><div class="text-sm text-slate-500 dark:text-gray-500">Uptime</div></div>
                </div>
            </div>
            <!-- Code editor mockup -->
            <div class="hidden lg:flex items-center justify-center" data-hero-animate>
                <div class="relative w-full max-w-lg">
                    <div class="glass-card p-6 shadow-premium float-slow">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            <span class="ml-3 text-xs text-slate-400 dark:text-gray-500 font-mono">project.tsx</span>
                        </div>
                        <pre class="text-sm font-mono leading-relaxed text-slate-700 dark:text-gray-300"><code><span class="text-purple-600 dark:text-purple-400">const</span> <span class="text-blue-600 dark:text-blue-400">EhsanDevelopers</span> = () =&gt; {
  <span class="text-purple-600 dark:text-purple-400">return</span> (
    &lt;<span class="text-teal-600 dark:text-teal-400">Solution</span>
      <span class="text-secondary-600 dark:text-secondary-400">quality</span>=<span class="text-green-600 dark:text-green-400">"premium"</span>
      <span class="text-secondary-600 dark:text-secondary-400">innovation</span>={<span class="text-blue-600 dark:text-blue-400">true</span>}
      <span class="text-secondary-600 dark:text-secondary-400">support</span>=<span class="text-green-600 dark:text-green-400">"24/7"</span>
    /&gt;
  );
};</code></pre>
                    </div>
                    <div class="absolute -top-4 -right-4 glass-card px-4 py-2 shadow-lg float-fast" style="animation-delay:-1s">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-primary-100 dark:bg-primary-900/50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            <div><div class="text-xs font-semibold text-slate-700 dark:text-white">Deployed</div><div class="text-[10px] text-slate-400 dark:text-gray-500">Just now</div></div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 glass-card px-4 py-2 shadow-lg float-med" style="animation-delay:-3s">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-secondary-100 dark:bg-secondary-900/50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-secondary-600 dark:text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></div>
                            <div><div class="text-xs font-semibold text-slate-700 dark:text-white">99.9%</div><div class="text-[10px] text-slate-400 dark:text-gray-500">Uptime</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 z-10 scroll-ind">
        <a href="#about" class="flex flex-col items-center gap-2 text-slate-400 dark:text-gray-600 hover:text-primary-500 transition-colors">
            <span class="text-xs font-medium uppercase tracking-widest">Scroll</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 2. MARQUEE                                                     --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<div class="bg-primary-600 dark:bg-primary-800 py-3 overflow-hidden">
    <div class="marquee-track text-white/90 text-sm font-semibold uppercase tracking-[0.25em]">
        @for($m = 0; $m < 2; $m++)
        <span class="flex items-center gap-8 px-4" @if($m) aria-hidden="true" @endif>
            @foreach(['Web Development','Mobile Apps','Custom Software','E-Commerce','Cloud Solutions','UI/UX Design','Cybersecurity','IT Consulting','API Development','Digital Marketing','AI & Machine Learning','Database Solutions'] as $svc)
            <span>{{ $svc }}</span><span class="text-secondary-300">&bull;</span>
            @endforeach
        </span>
        @endfor
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 2B. TRUSTED BY / AWARDS                                        --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section class="py-16 bg-white dark:bg-surface-900 border-b border-gray-100 dark:border-surface-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10" data-reveal>
            <p class="text-sm font-semibold text-slate-400 dark:text-gray-600 uppercase tracking-widest">Trusted by businesses across East Africa</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 items-start" data-reveal>
            @foreach(\App\Models\TrustedClient::active()->orderBy('sort_order')->get() as $client)
            <div class="flex flex-col items-center gap-3 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-surface-800 transition-colors group cursor-default">
                <div class="w-20 h-20 rounded-full bg-white dark:bg-surface-700 ring-1 ring-slate-200 dark:ring-surface-600 flex items-center justify-center overflow-hidden group-hover:ring-primary-300 dark:group-hover:ring-primary-700 group-hover:shadow-lg transition-all duration-300">
                    @if($client->logo)
                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="w-14 h-14 object-contain">
                    @else
                    <span class="text-xl font-display font-bold text-slate-400 dark:text-gray-500">{{ strtoupper(substr($client->name, 0, 2)) }}</span>
                    @endif
                </div>
                <div class="text-center">
                    <span class="text-xs font-semibold text-slate-700 dark:text-gray-300 block">{{ $client->name }}</span>
                    <span class="text-[10px] text-slate-400 dark:text-gray-600">{{ $client->industry }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex flex-wrap justify-center gap-6 mt-12 pt-8 border-t border-gray-100 dark:border-surface-700" data-reveal>
            @foreach([
                ['ISO 27001','Security Certified'],
                ['GDPR','Data Compliant'],
                ['Agile','Scrum Master Certified'],
                ['AWS','Partner Network'],
            ] as $badge)
            <div class="flex items-center gap-3 px-5 py-3 rounded-full bg-primary-50 dark:bg-primary-900/20 border border-primary-100 dark:border-primary-900/40">
                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <div>
                    <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $badge[0] }}</div>
                    <div class="text-[10px] text-slate-500 dark:text-gray-500">{{ $badge[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 3. ABOUT                                                       --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="about" class="section-padding bg-white dark:bg-surface-900 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100/40 dark:bg-primary-900/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative" data-reveal>
                {{-- IDE / Code Editor Mockup --}}
                <div class="rounded-2xl overflow-hidden shadow-premium bg-[#1e1e2e] border border-slate-700/50">
                    {{-- Title bar --}}
                    <div class="flex items-center justify-between px-4 py-2.5 bg-[#181825] border-b border-slate-700/50">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400/80"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400/80"></div>
                        </div>
                        <div class="flex items-center gap-1 text-[10px] text-slate-500 font-mono">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            app.dart — Ehsan Developers
                        </div>
                        <div class="w-16"></div>
                    </div>

                    {{-- Tab bar --}}
                    <div class="flex bg-[#181825] border-b border-slate-700/30 overflow-x-auto">
                        <div class="flex items-center gap-2 px-4 py-1.5 bg-[#1e1e2e] border-r border-slate-700/30 text-[10px] text-emerald-400 font-mono whitespace-nowrap">
                            <svg class="w-3 h-3 text-cyan-400" fill="currentColor" viewBox="0 0 24 24"><path d="M14.23 12.004a2.236 2.236 0 01-2.235 2.236 2.236 2.236 0 01-2.236-2.236 2.236 2.236 0 012.235-2.236 2.236 2.236 0 012.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.31 0-.593.063-.84.188C5.04 2.15 4.5 3.54 4.5 5.672c0 2.058.738 4.473 2.072 6.856C7.906 14.91 9.694 17.065 12 18.85c2.306-1.785 4.094-3.94 5.428-6.322C18.762 10.145 19.5 7.73 19.5 5.672c0-2.132-.54-3.522-1.763-4.15a2.06 2.06 0 00-.84-.188z"/></svg>
                            app.dart
                        </div>
                        <div class="flex items-center gap-2 px-4 py-1.5 text-[10px] text-slate-500 font-mono whitespace-nowrap">
                            <svg class="w-3 h-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/></svg>
                            api.php
                        </div>
                        <div class="flex items-center gap-2 px-4 py-1.5 text-[10px] text-slate-500 font-mono whitespace-nowrap">
                            <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7z"/></svg>
                            schema.sql
                        </div>
                    </div>

                    {{-- Code area with line numbers --}}
                    <div class="flex">
                        {{-- Line numbers --}}
                        <div class="py-4 pl-4 pr-3 text-right select-none border-r border-slate-700/30">
                            @for($ln = 1; $ln <= 18; $ln++)
                            <div class="text-[11px] leading-5 font-mono {{ $ln === 8 ? 'text-emerald-400' : 'text-slate-600' }}">{{ $ln }}</div>
                            @endfor
                        </div>

                        {{-- Code content --}}
                        <div class="py-4 pl-4 pr-6 overflow-hidden flex-1 relative">
                            {{-- Active line highlight --}}
                            <div class="absolute left-0 right-0 h-5 bg-slate-700/20" style="top:calc(1rem + 7 * 1.25rem)"></div>

                            <pre class="text-[11px] leading-5 font-mono"><code><span class="text-violet-400">import</span> <span class="text-amber-300">'package:flutter/material.dart'</span>;
<span class="text-violet-400">import</span> <span class="text-amber-300">'package:ehsan/services/api.dart'</span>;

<span class="text-slate-500">/// Ehsan Developers — Building Digital Excellence</span>
<span class="text-cyan-400">class</span> <span class="text-emerald-400">EhsanApp</span> <span class="text-cyan-400">extends</span> <span class="text-emerald-400">StatelessWidget</span> {
  <span class="text-slate-500">@override</span>
  <span class="text-emerald-400">Widget</span> <span class="text-cyan-300">build</span>(<span class="text-emerald-400">BuildContext</span> <span class="text-orange-300">context</span>) {
    <span class="text-violet-400">return</span> <span class="text-emerald-400">MaterialApp</span>(<span class="typing-cursor"></span>
      <span class="text-orange-300">title</span>: <span class="text-amber-300">'Ehsan Developers'</span>,
      <span class="text-orange-300">theme</span>: <span class="text-emerald-400">ThemeData</span>(
        <span class="text-orange-300">primarySwatch</span>: <span class="text-emerald-400">Colors</span>.<span class="text-cyan-300">teal</span>,
        <span class="text-orange-300">fontFamily</span>: <span class="text-amber-300">'Inter'</span>,
      ),
      <span class="text-orange-300">home</span>: <span class="text-emerald-400">DashboardScreen</span>(),
      <span class="text-orange-300">debugShowCheckedModeBanner</span>: <span class="text-violet-400">false</span>,
    );
  }
}</code></pre>

                            {{-- Minimap (right side decoration) --}}
                            <div class="absolute top-4 right-2 w-8 space-y-0.5 opacity-30">
                                <div class="h-0.5 bg-violet-400 rounded w-4"></div>
                                <div class="h-0.5 bg-amber-300 rounded w-7"></div>
                                <div class="h-0.5 bg-slate-500 rounded w-3"></div>
                                <div class="h-0.5 bg-slate-500 rounded w-5"></div>
                                <div class="h-0.5 bg-cyan-400 rounded w-6"></div>
                                <div class="h-0.5 bg-emerald-400 rounded w-7"></div>
                                <div class="h-0.5 bg-slate-500 rounded w-2"></div>
                                <div class="h-0.5 bg-violet-400 rounded w-5"></div>
                                <div class="h-0.5 bg-orange-300 rounded w-6"></div>
                                <div class="h-0.5 bg-amber-300 rounded w-7"></div>
                                <div class="h-0.5 bg-orange-300 rounded w-4"></div>
                                <div class="h-0.5 bg-emerald-400 rounded w-5"></div>
                                <div class="h-0.5 bg-amber-300 rounded w-3"></div>
                                <div class="h-0.5 bg-orange-300 rounded w-6"></div>
                                <div class="h-0.5 bg-violet-400 rounded w-4"></div>
                                <div class="h-0.5 bg-slate-500 rounded w-2"></div>
                                <div class="h-0.5 bg-emerald-400 rounded w-5"></div>
                                <div class="h-0.5 bg-slate-500 rounded w-3"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Status bar --}}
                    <div class="flex items-center justify-between px-4 py-1 bg-primary-700 text-[9px] text-white/80 font-mono">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                main
                            </span>
                            <span>Dart</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span>Ln 8, Col 32</span>
                            <span>UTF-8</span>
                            <span class="flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                Connected
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Terminal floating card --}}
                <div class="absolute -bottom-4 -left-4 bg-[#1e1e2e] rounded-xl p-3 shadow-2xl border border-slate-700/50 max-w-[220px] z-10">
                    <div class="flex items-center gap-1.5 mb-2">
                        <div class="w-2 h-2 rounded-full bg-red-500/70"></div>
                        <div class="w-2 h-2 rounded-full bg-amber-400/70"></div>
                        <div class="w-2 h-2 rounded-full bg-emerald-400/70"></div>
                        <span class="text-[8px] text-slate-500 font-mono ml-1">terminal</span>
                    </div>
                    <div class="font-mono text-[9px] space-y-1">
                        <div><span class="text-emerald-400">$</span> <span class="text-slate-300">flutter build apk</span></div>
                        <div class="text-slate-500">Building with sound null safety...</div>
                        <div class="text-emerald-400">✓ Built build/app-release.apk</div>
                        <div><span class="text-emerald-400">$</span> <span class="text-slate-400 typing-cursor"></span></div>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 bg-white dark:bg-surface-700 rounded-2xl p-5 shadow-2xl border border-gray-100 dark:border-surface-600 z-10">
                    <div class="text-3xl font-display font-bold gradient-text">5+</div>
                    <div class="text-xs text-slate-600 dark:text-gray-400 font-medium">Years of<br>Excellence</div>
                </div>
            </div>
            <div>
                <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                    <span class="w-8 h-[2px] bg-primary-500"></span> About Us
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6 leading-tight" data-reveal>
                    Transforming Ideas Into <span class="gradient-text">Powerful Solutions</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-gray-400 mb-6 leading-relaxed" data-reveal>
                    Ehsan Developers is a forward-thinking IT company dedicated to crafting innovative digital solutions. We combine cutting-edge technology with creative excellence to help businesses thrive in the digital era.
                </p>
                <p class="text-slate-500 dark:text-gray-500 mb-8 leading-relaxed" data-reveal>
                    Our team of experienced engineers, designers, and strategists work collaboratively to deliver solutions that are not just functional, but transformative. Whether it's a sleek mobile app, a robust web platform, or a comprehensive enterprise system, we bring your vision to life with precision and passion.
                </p>
                <div class="grid sm:grid-cols-2 gap-4" data-reveal>
                    @foreach([
                        ['Innovation First','Cutting-edge solutions with modern stacks','bg-primary','M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                        ['On-Time Delivery','We respect deadlines and deliver on schedule','bg-secondary','M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['Quality Assured','Rigorous testing and code review standards','bg-teal','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['Client-Centric','Your success is our measure of achievement','bg-purple','M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z']
                    ] as $v)
                    <div class="flex items-start gap-3 p-4 rounded-xl {{ $v[2] }}-50/50 dark:{{ $v[2] }}-900/20 border {{ $v[2] }}-100 dark:border-{{ str_replace('bg-','',$v[2]) }}-900/30">
                        <div class="w-10 h-10 rounded-lg {{ $v[2] }}-100 dark:{{ $v[2] }}-900/50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-{{ str_replace('bg-','',$v[2]) }}-600 dark:text-{{ str_replace('bg-','',$v[2]) }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $v[3] }}"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-slate-800 dark:text-white text-sm">{{ $v[0] }}</div>
                            <div class="text-xs text-slate-500 dark:text-gray-500 mt-1">{{ $v[1] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 4. SERVICES                                                    --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="services" class="section-padding bg-slate-50 dark:bg-surface-800 relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-teal-200/20 dark:bg-teal-900/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    <div class="absolute top-0 right-0 w-64 h-64 bg-secondary-200/20 dark:bg-secondary-900/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> What We Do <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                Comprehensive <span class="gradient-text">IT Solutions</span>
            </h2>
            <p class="text-lg text-slate-600 dark:text-gray-400" data-reveal>
                We offer a full spectrum of digital services to help your business succeed in the modern world. Each solution is tailored to your unique needs.
            </p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 stagger" data-reveal>
            @php
            $services = [
                ['Website Development','Custom websites, web applications, CMS platforms, and landing pages built with modern frameworks.','primary','M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9','website-development'],
                ['Mobile App Development','Native & cross-platform mobile apps for iOS and Android using Flutter, React Native, Swift & Kotlin.','blue','M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z','mobile-app-development'],
                ['Custom Software','Enterprise software, SaaS platforms, workflow automation, and bespoke systems for your operations.','purple','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4','custom-software'],
                ['E-Commerce Solutions','Full-featured online stores with M-Pesa, Stripe, inventory management & analytics dashboards.','amber','M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z','e-commerce-solutions'],
                ['Cloud & DevOps','AWS, Azure, Google Cloud deployment, CI/CD pipelines, Docker, Kubernetes & infrastructure automation.','cyan','M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z','cloud-devops'],
                ['UI/UX Design','User research, wireframing, prototyping & pixel-perfect interfaces that delight users.','pink','M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01','ui-ux-design'],
                ['Cybersecurity','Security audits, vulnerability assessments, penetration testing, SSL & compliance solutions.','red','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z','cybersecurity'],
                ['IT Consulting','Digital transformation strategy, technology audits, system architecture & expert advisory.','indigo','M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','it-consulting'],
                ['API Development','RESTful & GraphQL APIs, third-party integrations, payment gateways & microservices architecture.','orange','M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z','api-development'],
                ['Digital Marketing & SEO','Search engine optimization, social media marketing, content strategy & analytics-driven campaigns.','emerald','M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z','digital-marketing-seo'],
                ['AI & Machine Learning','Chatbots, predictive analytics, recommendation engines, NLP & intelligent automation.','violet','M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','ai-machine-learning'],
                ['Database & Infrastructure','Database design, optimization, migration, server management & scalable infrastructure.','teal','M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4','database-infrastructure'],
            ];
            @endphp
            @foreach($services as $s)
            <a href="/services/{{ $s[4] }}" class="service-card glass-card p-6 rounded-2xl group glow-border cursor-pointer block">
                <div class="s-icon w-14 h-14 bg-{{ $s[2] }}-100 dark:bg-{{ $s[2] }}-900/40 rounded-xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-7 h-7 text-{{ $s[2] }}-600 dark:text-{{ $s[2] }}-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $s[3] }}"/></svg>
                </div>
                <h3 class="text-lg font-display font-bold text-slate-800 dark:text-white mb-2">{{ $s[0] }}</h3>
                <p class="text-sm text-slate-500 dark:text-gray-400 mb-4 leading-relaxed">{{ $s[1] }}</p>
                <div class="flex items-center text-primary-600 dark:text-primary-400 text-sm font-semibold">
                    Learn more <svg class="w-4 h-4 ml-1 s-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-12" data-reveal>
            <a href="{{ url('/request-service') }}" class="btn-primary text-base px-10 py-4 gap-2 group">
                Request a Custom Solution
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 5. HOW WE WORK                                                 --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="process" class="section-padding bg-white dark:bg-surface-900 relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Our Process <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                How We <span class="gradient-text">Bring Ideas to Life</span>
            </h2>
            <p class="text-lg text-slate-600 dark:text-gray-400" data-reveal>
                Our proven four-step process ensures every project is delivered with excellence, on time, and within budget.
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
            $steps = [
                ['01','Discover','We dive deep into your requirements, research your market, and understand your goals to craft the perfect strategy.','M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z','from-primary-500 to-teal-500'],
                ['02','Design','Our designers create stunning, user-centered interfaces with wireframes and interactive prototypes for your approval.','M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z','from-teal-500 to-cyan-500'],
                ['03','Develop','Our engineers build your solution using best practices, clean code, and agile methodology with regular updates.','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4','from-cyan-500 to-blue-500'],
                ['04','Deploy','We launch your project, provide training, set up monitoring, and offer ongoing support & maintenance.','M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z','from-blue-500 to-primary-500'],
            ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="relative" data-reveal>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br {{ $step[4] }} flex items-center justify-center shadow-lg relative">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step[3] }}"/></svg>
                        <div class="absolute -top-2 -right-2 w-7 h-7 bg-white dark:bg-surface-700 rounded-full flex items-center justify-center text-xs font-bold text-primary-600 dark:text-primary-400 shadow-md border-2 border-primary-200 dark:border-primary-800">{{ $step[0] }}</div>
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white mb-3">{{ $step[1] }}</h3>
                    <p class="text-sm text-slate-500 dark:text-gray-400 leading-relaxed">{{ $step[2] }}</p>
                </div>
                @if($i < 3)
                <div class="hidden lg:block absolute top-10 left-[calc(100%-8px)] w-[calc(100%-56px)] h-[2px] bg-gradient-to-r {{ $step[4] }} opacity-30"></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 6. STATS                                                       --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-gradient-to-r from-primary-900 via-primary-800 to-teal-900 dark:from-surface-800 dark:via-surface-700 dark:to-surface-800 relative overflow-hidden" data-stat-trigger>
    <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,white 1px,transparent 1px);background-size:30px 30px"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach([
                ['200','Projects Delivered','+'],
                ['150','Happy Clients','+'],
                ['50','Team Members','+'],
                ['99.9','Uptime Guarantee','%'],
            ] as $stat)
            <div class="stat-card p-6 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10" x-data="statCounter" data-target="{{ $stat[0] }}" data-suffix="{{ $stat[2] }}">
                <div class="text-4xl lg:text-5xl font-display font-bold text-white mb-2">
                    <span x-text="current">0</span><span class="text-secondary-400" x-text="suffix"></span>
                </div>
                <div class="text-sm text-primary-200 dark:text-gray-400 font-medium">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 7. WHY CHOOSE US                                               --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section class="section-padding bg-slate-50 dark:bg-surface-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                    <span class="w-8 h-[2px] bg-primary-500"></span> Why Choose Us
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6 leading-tight" data-reveal>
                    We Don't Just Build Software, We Build <span class="gradient-text">Partnerships</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-gray-400 mb-10" data-reveal>
                    Choosing the right technology partner can make or break your project. Here's why industry leaders trust Ehsan Developers.
                </p>
                <div class="space-y-6">
                    @foreach([
                        ['Agile Development','We use Scrum methodology with 2-week sprints, daily standups, and transparent progress tracking.','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
                        ['24/7 Support & Maintenance','Post-launch support, bug fixes, performance monitoring, and feature updates around the clock.','M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z'],
                        ['Transparent Pricing','No hidden fees. Fixed-price or time-and-materials contracts with detailed breakdowns and milestones.','M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['Modern Tech Stack','We use the latest frameworks and tools&mdash;React, Laravel, Flutter, AWS, Docker, and more.','M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                        ['Scalable Architecture','Solutions designed to grow with your business, handling thousands to millions of users seamlessly.','M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
                        ['Data Security','ISO-aligned security practices, encrypted communications, GDPR compliance, and secure coding standards.','M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                    ] as $j => $f)
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-white dark:hover:bg-surface-700 transition-colors group" data-reveal>
                        <div class="w-12 h-12 rounded-xl bg-primary-100 dark:bg-primary-900/40 flex items-center justify-center flex-shrink-0 group-hover:bg-primary-600 transition-colors">
                            <svg class="w-6 h-6 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f[2] }}"/></svg>
                        </div>
                        <div>
                            <h3 class="text-base font-display font-bold text-slate-800 dark:text-white mb-1">{{ $f[0] }}</h3>
                            <p class="text-sm text-slate-500 dark:text-gray-400 leading-relaxed">{!! $f[1] !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Right: visual -->
            <div class="relative hidden lg:block" data-reveal>
                <div class="glass-card p-8 rounded-2xl shadow-premium">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700 dark:text-white">Client Satisfaction</span>
                            <span class="text-sm font-bold text-primary-600 dark:text-primary-400">98%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-surface-600 rounded-full h-3"><div class="bg-gradient-to-r from-primary-500 to-teal-500 h-3 rounded-full" style="width:98%"></div></div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700 dark:text-white">On-Time Delivery</span>
                            <span class="text-sm font-bold text-primary-600 dark:text-primary-400">95%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-surface-600 rounded-full h-3"><div class="bg-gradient-to-r from-teal-500 to-cyan-500 h-3 rounded-full" style="width:95%"></div></div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700 dark:text-white">Code Quality Score</span>
                            <span class="text-sm font-bold text-primary-600 dark:text-primary-400">A+</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-surface-600 rounded-full h-3"><div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-3 rounded-full" style="width:97%"></div></div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700 dark:text-white">Client Retention</span>
                            <span class="text-sm font-bold text-primary-600 dark:text-primary-400">92%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-surface-600 rounded-full h-3"><div class="bg-gradient-to-r from-blue-500 to-primary-500 h-3 rounded-full" style="width:92%"></div></div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-surface-600 grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-display font-bold text-slate-900 dark:text-white">4.9<span class="text-secondary-500 text-lg">/5</span></div>
                            <div class="text-xs text-slate-500 dark:text-gray-500">Avg Rating</div>
                        </div>
                        <div>
                            <div class="text-2xl font-display font-bold text-slate-900 dark:text-white">2<span class="text-primary-500 text-lg">wk</span></div>
                            <div class="text-xs text-slate-500 dark:text-gray-500">Sprint Cycle</div>
                        </div>
                        <div>
                            <div class="text-2xl font-display font-bold text-slate-900 dark:text-white">24<span class="text-primary-500 text-lg">h</span></div>
                            <div class="text-xs text-slate-500 dark:text-gray-500">Response Time</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 8. TECH STACK                                                  --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section class="section-padding bg-white dark:bg-surface-900">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Technologies <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                Built With <span class="gradient-text">Industry-Leading</span> Tools
            </h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 stagger" data-reveal>
            @foreach([
                ['Laravel','#FF2D20'],['Flutter','#02569B'],['React','#61DAFB'],['Vue.js','#4FC08D'],['Node.js','#339933'],['Python','#3776AB'],
                ['Docker','#2496ED'],['AWS','#FF9900'],['MySQL','#4479A1'],['MongoDB','#47A248'],['Tailwind','#06B6D4'],['TypeScript','#3178C6'],
                ['Next.js','#000000'],['Firebase','#FFCA28'],['Redis','#DC382D'],['Git','#F05032'],['Figma','#F24E1E'],['Kubernetes','#326CE5'],
            ] as $tech)
            <div class="tech-logo flex flex-col items-center gap-3 p-4 rounded-xl bg-gray-50 dark:bg-surface-700/50 border border-gray-100 dark:border-surface-600 hover:border-primary-300 dark:hover:border-primary-700 transition-all cursor-default">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background:{{ $tech[1] }}15">
                    <span class="text-lg font-bold" style="color:{{ $tech[1] }}">{{ substr($tech[0],0,2) }}</span>
                </div>
                <span class="text-xs font-medium text-slate-600 dark:text-gray-400">{{ $tech[0] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 9. PORTFOLIO                                                   --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="portfolio" class="section-padding bg-slate-50 dark:bg-surface-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Our Work <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                Projects That <span class="gradient-text">Speak for Themselves</span>
            </h2>
            <p class="text-lg text-slate-600 dark:text-gray-400" data-reveal>
                A showcase of our recent work across different industries and technologies.
            </p>
        </div>
        @php $projects = \App\Models\PortfolioItem::orderBy('sort_order')->limit(6)->get(); @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 stagger" data-reveal>
            @forelse($projects as $p)
            <div class="portfolio-card group rounded-2xl overflow-hidden bg-white dark:bg-surface-700 shadow-lg border border-gray-100 dark:border-surface-600 hover:shadow-xl transition-shadow">
                <div class="aspect-video relative overflow-hidden">
                    @if($p->featured_image)
                    <img src="{{ asset('storage/' . $p->featured_image) }}" alt="{{ $p->title }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-primary-600 to-teal-600">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white/20 text-6xl font-display font-bold">{{ substr($p->title,0,1) }}</span>
                        </div>
                        <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,white 1px,transparent 1px);background-size:20px 20px"></div>
                    </div>
                    @endif
                    <div class="p-overlay absolute inset-0 bg-black/60 flex items-center justify-center">
                        <a href="{{ url('/portfolio/' . $p->slug) }}" class="btn-primary text-sm px-6 py-2.5">View Details</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-semibold text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/30 px-3 py-1 rounded-full">{{ $p->category->name ?? 'Project' }}</span>
                    </div>
                    <h3 class="text-lg font-display font-bold text-slate-800 dark:text-white mb-2">{{ $p->title }}</h3>
                    <p class="text-sm text-slate-500 dark:text-gray-400 mb-3 leading-relaxed">{{ Str::limit($p->description, 120) }}</p>
                    <div class="text-xs text-slate-400 dark:text-gray-500 font-mono">{{ is_array($p->technologies) ? implode(', ', $p->technologies) : $p->technologies }}</div>
                </div>
            </div>
            @empty
            <div class="sm:col-span-2 lg:col-span-3 text-center py-12">
                <p class="text-slate-500 dark:text-gray-500">Portfolio projects coming soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 10. TESTIMONIALS                                               --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="testimonials" class="section-padding bg-white dark:bg-surface-900 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100/30 dark:bg-primary-900/10 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Testimonials <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                What Our <span class="gradient-text">Clients Say</span>
            </h2>
            <p class="text-lg text-slate-600 dark:text-gray-400" data-reveal>
                Don't just take our word for it. Here's what our clients have to say about working with Ehsan Developers.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                [
                    'name' => 'James Mwangi',
                    'title' => 'CEO',
                    'company' => 'SwiftLogistics Kenya',
                    'initials' => 'JM',
                    'color' => 'from-primary-500 to-teal-500',
                    'stars' => 5,
                    'quote' => 'Ehsan Developers transformed our logistics operations with a custom fleet management system. The team was responsive, professional, and delivered ahead of schedule. Our efficiency improved by 40% within the first quarter.',
                ],
                [
                    'name' => 'Amina Hassan',
                    'title' => 'Founder',
                    'company' => 'NairobiEats',
                    'initials' => 'AH',
                    'color' => 'from-teal-500 to-cyan-500',
                    'stars' => 5,
                    'quote' => 'They built our food delivery app from scratch — both iOS and Android. The quality of the UI/UX design exceeded our expectations. We went from concept to launch in just three months.',
                ],
                [
                    'name' => 'David Ochieng',
                    'title' => 'Operations Director',
                    'company' => 'GreenField Farms',
                    'initials' => 'DO',
                    'color' => 'from-secondary-500 to-orange-500',
                    'stars' => 5,
                    'quote' => 'The inventory management system they developed for our agricultural supply chain has been a game-changer. Real-time tracking, automated reports, and excellent post-launch support.',
                ],
                [
                    'name' => 'Sarah Kimani',
                    'title' => 'Marketing Manager',
                    'company' => 'Horizon Realty',
                    'initials' => 'SK',
                    'color' => 'from-purple-500 to-pink-500',
                    'stars' => 5,
                    'quote' => 'Our new website and CRM system have completely streamlined how we manage property listings and client relationships. The team truly understood our business needs from day one.',
                ],
                [
                    'name' => 'Michael Otieno',
                    'title' => 'CTO',
                    'company' => 'PaySwift Solutions',
                    'initials' => 'MO',
                    'color' => 'from-primary-600 to-blue-500',
                    'stars' => 5,
                    'quote' => 'We needed a fintech platform that could handle high transaction volumes securely. Ehsan Developers delivered a robust, scalable solution with excellent security practices. Highly recommended.',
                ],
                [
                    'name' => 'Fatuma Ali',
                    'title' => 'Director',
                    'company' => 'EduBridge Academy',
                    'initials' => 'FA',
                    'color' => 'from-emerald-500 to-teal-500',
                    'stars' => 5,
                    'quote' => 'The e-learning platform they built handles thousands of students seamlessly. The admin dashboard is intuitive and the mobile app works flawlessly. Outstanding work and ongoing support.',
                ],
            ] as $testimonial)
            <div class="glass-card rounded-2xl p-8 flex flex-col" data-reveal>
                <!-- Stars -->
                <div class="flex gap-1 mb-4">
                    @for($s = 0; $s < $testimonial['stars']; $s++)
                    <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <!-- Quote -->
                <p class="text-slate-600 dark:text-gray-400 leading-relaxed mb-6 flex-1">"{{ $testimonial['quote'] }}"</p>
                <!-- Author -->
                <div class="flex items-center gap-4 pt-4 border-t border-slate-100 dark:border-surface-600">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br {{ $testimonial['color'] }} flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-sm">{{ $testimonial['initials'] }}</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-display font-bold text-slate-800 dark:text-white">{{ $testimonial['name'] }}</h4>
                        <p class="text-xs text-slate-500 dark:text-gray-500">{{ $testimonial['title'] }}, {{ $testimonial['company'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 11. CASE STUDIES                                               --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="case-studies" class="section-padding bg-slate-50 dark:bg-surface-800 relative overflow-hidden">
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-teal-100/30 dark:bg-teal-900/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Case Studies <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                Real Results for <span class="gradient-text">Real Businesses</span>
            </h2>
            <p class="text-lg text-slate-600 dark:text-gray-400" data-reveal>
                See how we've helped businesses across East Africa transform their operations and accelerate growth.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Case Study 1: SwiftLogistics --}}
            <div class="glass-card rounded-2xl overflow-hidden group" data-reveal>
                <div class="p-8">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-400 mb-4">
                        Logistics & Fleet Management
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-2">SwiftLogistics Kenya</h3>
                    <div class="space-y-4 mb-6">
                        <div>
                            <h4 class="text-sm font-semibold text-slate-500 dark:text-gray-500 uppercase tracking-wider mb-1">Challenge</h4>
                            <p class="text-sm text-slate-600 dark:text-gray-400">Manual fleet tracking causing delivery delays, lost packages, and zero real-time visibility across 50+ vehicles.</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-500 dark:text-gray-500 uppercase tracking-wider mb-1">Solution</h4>
                            <p class="text-sm text-slate-600 dark:text-gray-400">Custom fleet management system with GPS tracking, automated dispatch, and real-time analytics dashboard.</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 mb-4">
                        <span class="text-4xl font-display font-bold gradient-text">40%</span>
                        <span class="text-sm text-slate-500 dark:text-gray-500 pb-1">faster deliveries</span>
                    </div>
                    <a href="{{ url('/portfolio') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-600 dark:text-primary-400 hover:gap-3 transition-all">
                        View Full Story
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Case Study 2: NairobiEats --}}
            <div class="glass-card rounded-2xl overflow-hidden group" data-reveal>
                <div class="p-8">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-teal-100 text-teal-700 dark:bg-teal-900/40 dark:text-teal-400 mb-4">
                        Food Delivery & E-Commerce
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-2">NairobiEats</h3>
                    <div class="space-y-4 mb-6">
                        <div>
                            <h4 class="text-sm font-semibold text-slate-500 dark:text-gray-500 uppercase tracking-wider mb-1">Challenge</h4>
                            <p class="text-sm text-slate-600 dark:text-gray-400">No digital presence — relying on phone orders and manual coordination with restaurant partners and riders.</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-500 dark:text-gray-500 uppercase tracking-wider mb-1">Solution</h4>
                            <p class="text-sm text-slate-600 dark:text-gray-400">Full-stack food delivery platform with iOS/Android apps, restaurant dashboard, and rider tracking system.</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 mb-4">
                        <span class="text-4xl font-display font-bold gradient-text">3x</span>
                        <span class="text-sm text-slate-500 dark:text-gray-500 pb-1">revenue in 6 months</span>
                    </div>
                    <a href="{{ url('/portfolio') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-600 dark:text-primary-400 hover:gap-3 transition-all">
                        View Full Story
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Case Study 3: GreenField Farms --}}
            <div class="glass-card rounded-2xl overflow-hidden group" data-reveal>
                <div class="p-8">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-400 mb-4">
                        Agriculture & Supply Chain
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-2">GreenField Farms</h3>
                    <div class="space-y-4 mb-6">
                        <div>
                            <h4 class="text-sm font-semibold text-slate-500 dark:text-gray-500 uppercase tracking-wider mb-1">Challenge</h4>
                            <p class="text-sm text-slate-600 dark:text-gray-400">Spreadsheet-based inventory causing stock mismatches, delayed procurement, and 15% product wastage annually.</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-500 dark:text-gray-500 uppercase tracking-wider mb-1">Solution</h4>
                            <p class="text-sm text-slate-600 dark:text-gray-400">Custom inventory management system with real-time tracking, automated reorder alerts, and supplier integration.</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 mb-4">
                        <span class="text-4xl font-display font-bold gradient-text">60%</span>
                        <span class="text-sm text-slate-500 dark:text-gray-500 pb-1">less product waste</span>
                    </div>
                    <a href="{{ url('/portfolio') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-600 dark:text-primary-400 hover:gap-3 transition-all">
                        View Full Story
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 12. FREE CONSULTATION CTA                                      --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
@php
    $ctaPhone = preg_replace('/\D/', '', \App\Models\PageContent::getValue('contact', 'phone', '+256 707 208954'));
@endphp
<section class="py-20 bg-gradient-to-r from-primary-900 via-teal-800 to-primary-900 dark:from-surface-800 dark:via-teal-900/50 dark:to-surface-800 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-4xl mx-auto text-center relative z-10 px-4">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-white mb-6" data-reveal>
            Ready to Transform Your Business?
        </h2>
        <p class="text-lg text-primary-100/80 mb-10 max-w-2xl mx-auto" data-reveal>
            Book a free consultation with our experts. We'll analyze your needs and propose a tailored digital solution — no strings attached.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4" data-reveal>
            <a href="{{ url('/request-service') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary-900 font-display font-bold rounded-full hover:bg-primary-50 hover:shadow-xl hover:shadow-white/10 transition-all duration-300 group">
                Book Free Consultation
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="https://wa.me/{{ $ctaPhone }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-8 py-4 border-2 border-white/30 text-white font-display font-bold rounded-full hover:bg-white/10 hover:border-white/50 transition-all duration-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Chat on WhatsApp
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 13. PRICING                                                    --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section class="section-padding bg-white dark:bg-surface-900 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-secondary-100/30 dark:bg-secondary-900/10 rounded-full blur-3xl -translate-y-1/2 -translate-x-1/2"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Pricing <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                Transparent <span class="gradient-text">Pricing Plans</span>
            </h2>
        </div>
        @php
        $plans = [
            [
                'name' => 'Basic',
                'price' => '$500',
                'label' => 'starting',
                'desc' => 'Perfect for personal brands and simple landing pages.',
                'color' => 'primary',
                'featured' => false,
                'features' => ['Single-page website','Responsive design','Contact form','Basic SEO setup','Mobile-friendly','SSL certificate'],
                'btn' => 'Get Started',
                'btnClass' => 'btn-outline',
            ],
            [
                'name' => 'Starter',
                'price' => '$1,000',
                'label' => 'starting',
                'desc' => 'For small businesses needing a professional multi-page website.',
                'color' => 'primary',
                'featured' => false,
                'features' => ['Everything in Basic','Up to 5 pages','Social media integration','Google Analytics setup','Content management system','1 month free support'],
                'btn' => 'Get Started',
                'btnClass' => 'btn-outline',
            ],
            [
                'name' => 'Professional',
                'price' => '$5,000',
                'label' => 'starting',
                'desc' => 'Custom web apps, e-commerce, or mobile solutions for growing businesses.',
                'color' => 'primary',
                'featured' => true,
                'features' => ['Everything in Starter','Custom web application','Admin dashboard','Payment integration','Advanced SEO & analytics','Database design & setup','API integrations','3 months free support'],
                'btn' => 'Get Started',
                'btnClass' => 'btn-primary',
            ],
            [
                'name' => 'Business',
                'price' => '$15,000',
                'label' => 'starting',
                'desc' => 'Complex systems with advanced features for established companies.',
                'color' => 'secondary',
                'featured' => false,
                'features' => ['Everything in Professional','Mobile app (iOS & Android)','User authentication system','Cloud hosting setup','CI/CD pipeline','Performance optimization','6 months free support'],
                'btn' => 'Get Started',
                'btnClass' => 'btn-outline',
            ],
            [
                'name' => 'Enterprise',
                'price' => 'Custom',
                'label' => '',
                'desc' => 'Full-scale enterprise solutions with dedicated teams and ongoing support.',
                'color' => 'secondary',
                'featured' => false,
                'features' => ['Everything in Business','Dedicated project team','Custom architecture design','Security audit & compliance','Load testing & scalability','24/7 priority support','SLA guarantee'],
                'btn' => 'Contact Us',
                'btnClass' => 'btn-secondary',
            ],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 stagger" data-reveal>
            @foreach($plans as $plan)
            <div class="glass-card p-6 rounded-2xl relative group hover:shadow-xl transition-shadow {{ $plan['featured'] ? 'shadow-xl border-2 border-primary-500 dark:border-primary-400 sm:scale-[1.02]' : '' }}">
                @if($plan['featured'])
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-primary-600 to-teal-600 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">Most Popular</div>
                @endif
                <div class="text-sm font-semibold text-{{ $plan['color'] }}-600 dark:text-{{ $plan['color'] }}-400 uppercase tracking-wider mb-2">{{ $plan['name'] }}</div>
                <div class="flex items-baseline gap-1 mb-1">
                    <span class="text-3xl font-display font-bold text-slate-900 dark:text-white">{{ $plan['price'] }}</span>
                    @if($plan['label'])
                    <span class="text-slate-400 dark:text-gray-500 text-sm">{{ $plan['label'] }}</span>
                    @endif
                </div>
                <p class="text-sm text-slate-500 dark:text-gray-400 mb-6">{{ $plan['desc'] }}</p>
                <ul class="space-y-2.5 mb-6">
                    @foreach($plan['features'] as $feat)
                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                        <svg class="w-4 h-4 text-{{ $plan['color'] }}-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ $feat }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ url('/request-service') }}" class="{{ $plan['btnClass'] }} w-full text-center text-sm">{{ $plan['btn'] }}</a>
            </div>
            @endforeach
        </div>
        </div>
        <p class="text-center text-sm text-slate-400 dark:text-gray-600 mt-8" data-reveal>
            All prices are estimates. Final pricing depends on project scope and requirements. <a href="{{ url('/request-service') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-medium">Get a free detailed quote</a>.
        </p>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 12. CTA                                                        --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section class="py-24 bg-gradient-to-br from-primary-900 via-primary-800 to-teal-900 dark:from-surface-800 dark:via-surface-700 dark:to-surface-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image:radial-gradient(circle,white 1px,transparent 1px);background-size:24px 24px"></div>
    <div class="absolute top-10 right-10 w-72 h-72 bg-secondary-500/20 rounded-full blur-3xl float-slow"></div>
    <div class="absolute bottom-10 left-10 w-64 h-64 bg-teal-500/20 rounded-full blur-3xl float-med"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-white mb-6 leading-tight" data-reveal>
            Ready to Transform Your <span class="text-secondary-400">Digital Presence?</span>
        </h2>
        <p class="text-lg text-primary-200 dark:text-gray-400 mb-10 max-w-2xl mx-auto" data-reveal>
            Let's discuss your project. Whether you need a website, mobile app, or custom software, our team is ready to bring your vision to life.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-reveal>
            <a href="{{ url('/request-service') }}" class="inline-flex items-center justify-center px-10 py-4 bg-secondary-500 hover:bg-secondary-600 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-glow-secondary hover:-translate-y-0.5 text-base gap-2 group">
                Get a Free Quote
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="tel:0707208954" class="inline-flex items-center justify-center px-10 py-4 border-2 border-white/30 text-white hover:bg-white/10 font-semibold rounded-lg transition-all duration-300 text-base gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Call: 0707 208 954
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- 13. CONTACT                                                    --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<section id="contact" class="section-padding bg-white dark:bg-surface-900 relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4" data-reveal>
                <span class="w-8 h-[2px] bg-primary-500"></span> Get In Touch <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white mb-6" data-reveal>
                Let's Start a <span class="gradient-text">Conversation</span>
            </h2>
        </div>
        <div class="grid lg:grid-cols-5 gap-12">
            <!-- Contact Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass-card p-6 rounded-2xl" data-reveal>
                    <h3 class="font-display font-bold text-slate-800 dark:text-white mb-6">Contact Information</h3>
                    <div class="space-y-5">
                        <a href="tel:0707208954" class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-primary-100 dark:bg-primary-900/40 flex items-center justify-center group-hover:bg-primary-600 transition-colors">
                                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500 dark:text-gray-500 uppercase tracking-wider">Phone</div>
                                <div class="text-slate-800 dark:text-white font-semibold">0707 208 954</div>
                            </div>
                        </a>
                        <a href="mailto:info@ehsandevelopers.com" class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-secondary-100 dark:bg-secondary-900/40 flex items-center justify-center group-hover:bg-secondary-600 transition-colors">
                                <svg class="w-5 h-5 text-secondary-600 dark:text-secondary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500 dark:text-gray-500 uppercase tracking-wider">Email</div>
                                <div class="text-slate-800 dark:text-white font-semibold">info@ehsandevelopers.com</div>
                            </div>
                        </a>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-teal-100 dark:bg-teal-900/40 flex items-center justify-center">
                                <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500 dark:text-gray-500 uppercase tracking-wider">Website</div>
                                <div class="text-slate-800 dark:text-white font-semibold">www.ehsandevelopers.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Office Hours -->
                <div class="glass-card p-6 rounded-2xl" data-reveal>
                    <h3 class="font-display font-bold text-slate-800 dark:text-white mb-4">Office Hours</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between"><span class="text-slate-500 dark:text-gray-400">Monday - Friday</span><span class="text-slate-800 dark:text-white font-medium">8:00 AM - 6:00 PM</span></div>
                        <div class="flex justify-between"><span class="text-slate-500 dark:text-gray-400">Saturday</span><span class="text-slate-800 dark:text-white font-medium">9:00 AM - 2:00 PM</span></div>
                        <div class="flex justify-between"><span class="text-slate-500 dark:text-gray-400">Sunday</span><span class="text-primary-600 dark:text-primary-400 font-medium">Emergency Only</span></div>
                    </div>
                </div>
            </div>
            <!-- Contact Form -->
            <div class="lg:col-span-3" data-reveal>
                <div class="glass-card p-8 rounded-2xl" x-data="contactForm">
                    <div x-show="success" x-transition class="text-center py-8">
                        <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white mb-2">Message Sent!</h3>
                        <p class="text-slate-500 dark:text-gray-400">We'll get back to you within 24 hours.</p>
                    </div>
                    <form x-show="!success" @submit.prevent="submit" class="space-y-6">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">Full Name *</label>
                                <input type="text" x-model="form.name" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="Your name">
                                <p x-show="errors.name" x-text="errors.name?.[0]" class="text-red-500 text-xs mt-1"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">Email Address *</label>
                                <input type="email" x-model="form.email" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="you@email.com">
                                <p x-show="errors.email" x-text="errors.email?.[0]" class="text-red-500 text-xs mt-1"></p>
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">Phone Number</label>
                                <input type="tel" x-model="form.phone" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="+254 7XX XXX XXX">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">Subject</label>
                                <input type="text" x-model="form.subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="Project inquiry">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">Inquiry Type</label>
                            <select x-model="form.inquiry_type" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                                <option value="general">General Inquiry</option>
                                <option value="project">New Project</option>
                                <option value="support">Technical Support</option>
                                <option value="partnership">Partnership</option>
                                <option value="career">Careers</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">Message *</label>
                            <textarea x-model="form.message" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition resize-none" placeholder="Tell us about your project..."></textarea>
                            <p x-show="errors.message" x-text="errors.message?.[0]" class="text-red-500 text-xs mt-1"></p>
                        </div>
                        <p x-show="errors.general" x-text="errors.general?.[0]" class="text-red-500 text-sm"></p>
                        <button type="submit" :disabled="loading" class="btn-primary w-full text-base py-4 gap-2">
                            <span x-show="!loading">Send Message</span>
                            <span x-show="loading" class="flex items-center gap-2">
                                <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                                Sending...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- WHATSAPP FLOATING BUTTON                                       --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<div class="fixed bottom-6 right-6 z-50" x-data="{ show: false, tooltip: false }" x-init="setTimeout(() => show = true, 2000)">
    <div x-show="show" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-75 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0" class="relative">
        <!-- Tooltip -->
        <div x-show="tooltip" x-transition class="absolute bottom-full right-0 mb-3 bg-white dark:bg-surface-700 text-slate-700 dark:text-white text-sm font-medium px-4 py-2 rounded-xl shadow-lg border border-gray-200 dark:border-surface-600 whitespace-nowrap">
            Chat with us on WhatsApp
            <div class="absolute top-full right-6 w-3 h-3 bg-white dark:bg-surface-700 border-r border-b border-gray-200 dark:border-surface-600 transform rotate-45 -translate-y-1.5"></div>
        </div>
        <!-- Button -->
        <a href="https://wa.me/254707208954?text=Hello%20Ehsan%20Developers!%20I'm%20interested%20in%20your%20services."
           target="_blank" rel="noopener"
           @mouseenter="tooltip = true" @mouseleave="tooltip = false"
           class="flex items-center justify-center w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        <!-- Pulse ring -->
        <span class="absolute inset-0 rounded-full bg-green-500 animate-ping opacity-20 pointer-events-none"></span>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════ --}}
{{-- PAGE SCRIPTS                                                   --}}
{{-- ═══════════════════════════════════════════════════════════════ --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ── Particle Network ──────────────────────────────────────────
    const canvas = document.getElementById('particle-canvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [], mouse = { x: null, y: null }, w, h, raf;

        function resize() {
            const rect = canvas.parentElement.getBoundingClientRect();
            w = canvas.width = rect.width;
            h = canvas.height = rect.height;
        }

        function init() {
            particles = [];
            const count = Math.min(80, Math.floor(w * h / 15000));
            for (let i = 0; i < count; i++) {
                particles.push({
                    x: Math.random() * w, y: Math.random() * h,
                    vx: (Math.random() - 0.5) * 0.5, vy: (Math.random() - 0.5) * 0.5,
                    r: Math.random() * 2 + 1, o: Math.random() * 0.5 + 0.2
                });
            }
        }

        function draw() {
            ctx.clearRect(0, 0, w, h);
            const dark = document.documentElement.classList.contains('dark');
            const c = dark ? '16,185,129' : '5,150,105';
            const gc = dark ? '245,158,11' : '217,119,6';

            particles.forEach((p, i) => {
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0 || p.x > w) p.vx *= -1;
                if (p.y < 0 || p.y > h) p.vy *= -1;

                if (mouse.x !== null) {
                    const dx = p.x - mouse.x, dy = p.y - mouse.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 150) { p.x += dx * 0.008; p.y += dy * 0.008; }
                }

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = i % 5 === 0 ? `rgba(${gc},${p.o * 0.7})` : `rgba(${c},${p.o})`;
                ctx.fill();

                for (let j = i + 1; j < particles.length; j++) {
                    const p2 = particles[j];
                    const dx = p.x - p2.x, dy = p.y - p2.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 120) {
                        ctx.beginPath(); ctx.moveTo(p.x, p.y); ctx.lineTo(p2.x, p2.y);
                        ctx.strokeStyle = `rgba(${c},${0.12 * (1 - dist / 120)})`;
                        ctx.lineWidth = 0.5; ctx.stroke();
                    }
                }
            });
            raf = requestAnimationFrame(draw);
        }

        canvas.parentElement.addEventListener('mousemove', e => {
            const rect = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left; mouse.y = e.clientY - rect.top;
        });
        canvas.parentElement.addEventListener('mouseleave', () => { mouse.x = null; mouse.y = null; });

        resize(); init(); draw();
        window.addEventListener('resize', () => { resize(); init(); });

        // Pause when not visible
        const observer = new IntersectionObserver(([entry]) => {
            if (entry.isIntersecting) { if (!raf) draw(); }
            else { cancelAnimationFrame(raf); raf = null; }
        });
        observer.observe(canvas.parentElement);
    }

    // ── Stagger reveal for children ───────────────────────────────
    document.querySelectorAll('.stagger').forEach(el => {
        if (window.ScrollTrigger) {
            ScrollTrigger.create({
                trigger: el, start: 'top 85%',
                onEnter: () => el.classList.add('revealed'),
                once: true
            });
        }
    });

    // ── Progress bars animate on scroll ───────────────────────────
    document.querySelectorAll('[style*="width:"]').forEach(bar => {
        const parent = bar.closest('[data-reveal]') || bar.closest('.glass-card');
        if (parent && window.ScrollTrigger) {
            const width = bar.style.width;
            bar.style.width = '0%';
            ScrollTrigger.create({
                trigger: parent, start: 'top 80%',
                onEnter: () => { bar.style.transition = 'width 1.5s ease'; bar.style.width = width; },
                once: true
            });
        }
    });
});
</script>

</x-layouts.app>

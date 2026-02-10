<x-layouts.app>
    <x-slot:title>Request Submitted - Ehsan Developers</x-slot:title>

    <section class="pt-28 pb-20 min-h-screen flex items-center">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Success Icon -->
            <div class="w-20 h-20 bg-primary-100 dark:bg-primary-900/30 rounded-full flex items-center justify-center mx-auto mb-8" data-hero-animate>
                <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h1 class="text-4xl font-display font-bold text-slate-800 dark:text-white mb-4" data-hero-animate>
                Request <span class="gradient-text">Submitted!</span>
            </h1>

            <p class="text-lg text-slate-600 dark:text-gray-400 mb-8" data-hero-animate>
                Thank you for your interest. Our team will review your request and get back to you within 24 hours.
            </p>

            <!-- Reference Card -->
            <div class="glass-card p-8 mb-8 text-left" data-hero-animate>
                <h2 class="text-lg font-semibold text-slate-800 dark:text-white mb-4">Request Details</h2>
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-surface-600">
                        <span class="text-slate-500 dark:text-gray-400">Reference Number</span>
                        <span class="font-mono font-semibold text-primary-600">{{ $serviceRequest->reference_number }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-surface-600">
                        <span class="text-slate-500 dark:text-gray-400">Status</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">New</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-surface-600">
                        <span class="text-slate-500 dark:text-gray-400">Submitted</span>
                        <span class="text-slate-700 dark:text-gray-300">{{ $serviceRequest->created_at->format('M d, Y \a\t g:i A') }}</span>
                    </div>
                    @if($serviceRequest->service)
                    <div class="flex justify-between items-center py-2">
                        <span class="text-slate-500 dark:text-gray-400">Service</span>
                        <span class="text-slate-700 dark:text-gray-300">{{ $serviceRequest->service->name }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <p class="text-sm text-slate-500 dark:text-gray-400 mb-6">
                Please save your reference number <strong class="text-primary-600">{{ $serviceRequest->reference_number }}</strong> for future correspondence.
            </p>

            <a href="{{ url('/') }}" class="btn-primary">
                Back to Home
            </a>
        </div>
    </section>
</x-layouts.app>

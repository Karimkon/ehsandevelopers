<x-layouts.app>
    <x-slot:title>Request a Service - Ehsan Developers</x-slot:title>

    <!-- Hero Banner -->
    <section class="pt-28 pb-12 bg-gradient-to-br from-primary-900/20 via-surface-900/50 to-teal-900/20 dark:from-surface-900 dark:via-surface-900 dark:to-surface-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold text-slate-800 dark:text-white mb-4" data-hero-animate>
                Request a <span class="gradient-text">Service</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-gray-400 max-w-2xl mx-auto" data-hero-animate>
                Tell us about your project and we'll get back to you within 24 hours with a tailored solution.
            </p>
        </div>
    </section>

    <!-- Service Request Form -->
    <section class="section-padding">
        <div class="max-w-3xl mx-auto">
            <div class="glass-card p-8 lg:p-12"
                 x-data="serviceRequestForm"
                 data-categories='@json($categories)'
                 data-services='@json($services)'>

                <!-- Progress Steps -->
                <div class="flex items-center justify-between mb-12">
                    <template x-for="(label, i) in ['Service', 'Project Details', 'Your Info']" :key="i">
                        <div class="flex items-center" :class="i < 2 ? 'flex-1' : ''">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 transition-all duration-300"
                                 :class="step > (i+1) ? 'bg-primary-600 border-primary-600 text-white' : step === (i+1) ? 'border-primary-600 text-primary-600' : 'border-gray-300 dark:border-surface-500 text-gray-400'">
                                <template x-if="step > (i+1)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </template>
                                <template x-if="step <= (i+1)">
                                    <span class="text-sm font-semibold" x-text="i+1"></span>
                                </template>
                            </div>
                            <span class="ml-3 text-sm font-medium hidden sm:inline"
                                  :class="step >= (i+1) ? 'text-slate-700 dark:text-white' : 'text-gray-400'" x-text="label"></span>
                            <template x-if="i < 2">
                                <div class="flex-1 h-0.5 mx-4 transition-colors duration-300"
                                     :class="step > (i+1) ? 'bg-primary-600' : 'bg-gray-200 dark:bg-surface-600'"></div>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- Error display -->
                <template x-if="errors.general">
                    <div class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 px-4 py-3 rounded-lg">
                        <template x-for="error in errors.general"><p x-text="error" class="text-sm"></p></template>
                    </div>
                </template>

                <!-- Step 1: Select Service -->
                <div x-show="step === 1" x-transition>
                    <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white mb-2">Choose a Service</h2>
                    <p class="text-slate-500 dark:text-gray-400 mb-8">Select the category and specific service you're interested in.</p>

                    <!-- Categories -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-3">Service Category</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <template x-for="cat in categories" :key="cat.id">
                                <button type="button" @click="selectCategory(cat.id)"
                                        class="p-4 rounded-xl border-2 text-left transition-all duration-200"
                                        :class="form.service_category_id == cat.id ? 'border-primary-600 bg-primary-50 dark:bg-primary-900/20' : 'border-gray-200 dark:border-surface-600 hover:border-primary-300 dark:hover:border-primary-800'">
                                    <span class="font-semibold text-slate-700 dark:text-white" x-text="cat.name"></span>
                                    <p class="text-sm text-slate-500 dark:text-gray-400 mt-1" x-text="cat.description"></p>
                                </button>
                            </template>
                        </div>
                        <template x-if="errors.service_category_id">
                            <p class="text-red-500 text-sm mt-2" x-text="errors.service_category_id[0]"></p>
                        </template>
                    </div>

                    <!-- Services -->
                    <div x-show="filteredServices.length > 0" x-transition>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-3">Specific Service</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <template x-for="svc in filteredServices" :key="svc.id">
                                <button type="button" @click="form.service_id = svc.id"
                                        class="p-4 rounded-xl border-2 text-left transition-all duration-200"
                                        :class="form.service_id == svc.id ? 'border-primary-600 bg-primary-50 dark:bg-primary-900/20' : 'border-gray-200 dark:border-surface-600 hover:border-primary-300 dark:hover:border-primary-800'">
                                    <span class="font-semibold text-slate-700 dark:text-white" x-text="svc.name"></span>
                                    <p class="text-sm text-slate-500 dark:text-gray-400 mt-1" x-text="svc.short_description"></p>
                                </button>
                            </template>
                        </div>
                        <template x-if="errors.service_id">
                            <p class="text-red-500 text-sm mt-2" x-text="errors.service_id[0]"></p>
                        </template>
                    </div>
                </div>

                <!-- Step 2: Project Details -->
                <div x-show="step === 2" x-transition>
                    <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white mb-2">Project Details</h2>
                    <p class="text-slate-500 dark:text-gray-400 mb-8">Tell us more about what you need.</p>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Project Description *</label>
                            <textarea x-model="form.project_description" rows="5"
                                      class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600 transition-colors"
                                      placeholder="Describe your project, goals, and any specific requirements..."></textarea>
                            <template x-if="errors.project_description">
                                <p class="text-red-500 text-sm mt-1" x-text="errors.project_description[0]"></p>
                            </template>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Budget Range</label>
                                <select x-model="form.budget_range"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600">
                                    <option value="">Select budget range</option>
                                    <option value="< $1,000">Less than $1,000</option>
                                    <option value="$1,000 - $5,000">$1,000 - $5,000</option>
                                    <option value="$5,000 - $15,000">$5,000 - $15,000</option>
                                    <option value="$15,000 - $50,000">$15,000 - $50,000</option>
                                    <option value="$50,000+">$50,000+</option>
                                    <option value="Not sure">Not sure yet</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Timeline</label>
                                <select x-model="form.timeline"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600">
                                    <option value="">Select timeline</option>
                                    <option value="ASAP">ASAP</option>
                                    <option value="1-2 weeks">1-2 weeks</option>
                                    <option value="1 month">1 month</option>
                                    <option value="1-3 months">1-3 months</option>
                                    <option value="3-6 months">3-6 months</option>
                                    <option value="Flexible">Flexible</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Attachments (optional)</label>
                            <input type="file" @change="handleFiles" multiple
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary-600 file:text-white file:font-medium file:cursor-pointer">
                            <p class="text-xs text-slate-400 mt-1">PDF, DOC, images — max 10MB each</p>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Contact Info -->
                <div x-show="step === 3" x-transition>
                    <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white mb-2">Your Information</h2>
                    <p class="text-slate-500 dark:text-gray-400 mb-8">How can we reach you?</p>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Full Name *</label>
                                <input type="text" x-model="form.name"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600"
                                       placeholder="Your full name">
                                <template x-if="errors.name">
                                    <p class="text-red-500 text-sm mt-1" x-text="errors.name[0]"></p>
                                </template>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Email *</label>
                                <input type="email" x-model="form.email"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600"
                                       placeholder="your@email.com">
                                <template x-if="errors.email">
                                    <p class="text-red-500 text-sm mt-1" x-text="errors.email[0]"></p>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Phone</label>
                                <input type="tel" x-model="form.phone"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600"
                                       placeholder="+1 (555) 123-4567">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Company</label>
                                <input type="text" x-model="form.company"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-surface-600 bg-white dark:bg-surface-800 text-slate-700 dark:text-gray-200 focus:ring-2 focus:ring-primary-600 focus:border-primary-600"
                                       placeholder="Your company name">
                            </div>
                        </div>

                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" x-model="form.privacy_accepted"
                                   class="mt-1 w-4 h-4 text-primary-600 rounded border-gray-300 focus:ring-primary-600">
                            <span class="text-sm text-slate-500 dark:text-gray-400">
                                I agree to the <a href="{{ url('/privacy-policy') }}" class="text-primary-600 hover:underline">Privacy Policy</a> and consent to being contacted regarding this request. *
                            </span>
                        </label>
                        <template x-if="errors.privacy_accepted">
                            <p class="text-red-500 text-sm" x-text="errors.privacy_accepted[0]"></p>
                        </template>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-10 pt-8 border-t border-gray-200 dark:border-surface-600">
                    <button type="button" x-show="step > 1" @click="prevStep()"
                            class="btn-outline text-sm px-6 py-2.5">
                        Back
                    </button>
                    <div x-show="step === 1" class="flex-1"></div>

                    <button type="button" x-show="step < 3" @click="nextStep()"
                            class="btn-primary text-sm px-8 py-2.5 ml-auto">
                        Continue
                    </button>

                    <button type="button" x-show="step === 3" @click="submit()"
                            :disabled="loading"
                            class="btn-primary text-sm px-8 py-2.5 ml-auto disabled:opacity-50">
                        <svg x-show="loading" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span x-text="loading ? 'Submitting...' : 'Submit Request'"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

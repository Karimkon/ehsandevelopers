import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// Theme toggle component
Alpine.data('themeToggle', () => ({
    dark: localStorage.getItem('theme') === 'dark' ||
          (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
    init() {
        this.$watch('dark', val => {
            localStorage.setItem('theme', val ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', val);
        });
    },
    toggle() {
        this.dark = !this.dark;
    }
}));

// Mobile nav component
Alpine.data('mobileNav', () => ({
    open: false,
    toggle() { this.open = !this.open; },
    close() { this.open = false; }
}));

// Contact form component
Alpine.data('contactForm', () => ({
    form: { name: '', email: '', phone: '', subject: '', message: '', inquiry_type: 'general' },
    loading: false,
    success: false,
    errors: {},
    async submit() {
        this.loading = true;
        this.errors = {};
        this.success = false;
        try {
            const response = await fetch('/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify(this.form)
            });
            const data = await response.json();
            if (!response.ok) {
                this.errors = data.errors || {};
                return;
            }
            this.success = true;
            this.form = { name: '', email: '', phone: '', subject: '', message: '', inquiry_type: 'general' };
        } catch (e) {
            this.errors = { general: ['Something went wrong. Please try again.'] };
        } finally {
            this.loading = false;
        }
    }
}));

// Service request form wizard
Alpine.data('serviceRequestForm', () => ({
    step: 1,
    form: {
        service_category_id: '',
        service_id: '',
        project_description: '',
        budget_range: '',
        timeline: '',
        name: '',
        email: '',
        phone: '',
        company: '',
        privacy_accepted: false,
    },
    files: [],
    loading: false,
    errors: {},
    categories: [],
    services: [],
    filteredServices: [],

    init() {
        this.categories = JSON.parse(this.$el.dataset.categories || '[]');
        this.services = JSON.parse(this.$el.dataset.services || '[]');
    },

    selectCategory(id) {
        this.form.service_category_id = id;
        this.form.service_id = '';
        this.filteredServices = this.services.filter(s => s.service_category_id == id);
    },

    nextStep() {
        if (this.validateStep()) this.step++;
    },
    prevStep() {
        this.step--;
    },

    validateStep() {
        this.errors = {};
        if (this.step === 1) {
            if (!this.form.service_category_id) this.errors.service_category_id = ['Please select a service category.'];
            if (!this.form.service_id) this.errors.service_id = ['Please select a service.'];
        }
        if (this.step === 2) {
            if (!this.form.project_description) this.errors.project_description = ['Please describe your project.'];
        }
        if (this.step === 3) {
            if (!this.form.name) this.errors.name = ['Name is required.'];
            if (!this.form.email) this.errors.email = ['Email is required.'];
            if (!this.form.privacy_accepted) this.errors.privacy_accepted = ['You must accept the privacy policy.'];
        }
        return Object.keys(this.errors).length === 0;
    },

    handleFiles(event) {
        this.files = Array.from(event.target.files);
    },

    async submit() {
        if (!this.validateStep()) return;
        this.loading = true;
        const formData = new FormData();
        Object.keys(this.form).forEach(key => {
            formData.append(key, this.form[key]);
        });
        this.files.forEach(file => {
            formData.append('attachments[]', file);
        });
        try {
            const response = await fetch('/request-service', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            });
            const data = await response.json();
            if (!response.ok) {
                this.errors = data.errors || {};
                return;
            }
            window.location.href = '/request-service/confirmation/' + data.reference_number;
        } catch (e) {
            this.errors = { general: ['Something went wrong. Please try again.'] };
        } finally {
            this.loading = false;
        }
    }
}));

// Stat counter animation
Alpine.data('statCounter', () => ({
    current: 0,
    target: 0,
    suffix: '',
    started: false,
    init() {
        this.target = parseInt(this.$el.dataset.target || 0);
        this.suffix = this.$el.dataset.suffix || '';
    },
    start() {
        if (this.started) return;
        this.started = true;
        const duration = 2000;
        const start = performance.now();
        const animate = (now) => {
            const elapsed = now - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            this.current = Math.round(this.target * eased);
            if (progress < 1) requestAnimationFrame(animate);
        };
        requestAnimationFrame(animate);
    }
}));

Alpine.start();

// GSAP Scroll Reveals
document.addEventListener('DOMContentLoaded', () => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.querySelectorAll('[data-reveal]').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
        return;
    }

    // Reveal animations
    document.querySelectorAll('[data-reveal]').forEach(el => {
        ScrollTrigger.create({
            trigger: el,
            start: 'top 85%',
            onEnter: () => el.classList.add('revealed'),
            once: true
        });
    });

    // Hero entrance animation
    const heroTimeline = gsap.timeline({ delay: 0.3 });
    const heroElements = document.querySelectorAll('[data-hero-animate]');
    if (heroElements.length) {
        heroTimeline.from(heroElements, {
            y: 40,
            opacity: 0,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power3.out'
        });
    }

    // Stat counter trigger
    document.querySelectorAll('[data-stat-trigger]').forEach(el => {
        ScrollTrigger.create({
            trigger: el,
            start: 'top 80%',
            onEnter: () => {
                el.querySelectorAll('[x-data]').forEach(component => {
                    const alpineData = Alpine.$data(component);
                    if (alpineData && alpineData.start) alpineData.start();
                });
            },
            once: true
        });
    });
});

import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Admin sidebar component
Alpine.data('adminSidebar', () => ({
    collapsed: localStorage.getItem('admin_sidebar_collapsed') === 'true',
    toggle() {
        this.collapsed = !this.collapsed;
        localStorage.setItem('admin_sidebar_collapsed', this.collapsed);
    }
}));

// Confirm delete modal
Alpine.data('confirmDelete', () => ({
    show: false,
    url: '',
    open(url) {
        this.url = url;
        this.show = true;
    },
    close() {
        this.show = false;
        this.url = '';
    }
}));

// Alert auto-dismiss
Alpine.data('alert', () => ({
    show: true,
    init() {
        setTimeout(() => this.show = false, 5000);
    }
}));

Alpine.start();

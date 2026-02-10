import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Admin layout component (responsive sidebar)
Alpine.data('adminLayout', () => ({
    collapsed: localStorage.getItem('admin_sidebar_collapsed') === 'true',
    mobileOpen: false,
    toggle() {
        this.collapsed = !this.collapsed;
        localStorage.setItem('admin_sidebar_collapsed', this.collapsed);
    }
}));

// Backward compat alias
Alpine.data('adminSidebar', () => ({
    collapsed: localStorage.getItem('admin_sidebar_collapsed') === 'true',
    mobileOpen: false,
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

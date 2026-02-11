<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceRequestController as AdminServiceRequestController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ServiceController as PublicServiceController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\TrustedClientController;
use App\Http\Controllers\BlogController as PublicBlogController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/blog', [PublicBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [PublicBlogController::class, 'show'])->name('blog.show');

Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/services/{service}', [PublicServiceController::class, 'show'])->name('services.show');

Route::get('/request-service', [ServiceRequestController::class, 'create'])->name('service-request.create');
Route::post('/request-service', [ServiceRequestController::class, 'store'])->name('service-request.store');
Route::get('/request-service/confirmation/{referenceNumber}', [ServiceRequestController::class, 'confirmation'])->name('service-request.confirmation');

Route::get('/faq', fn() => view('site.faq'))->name('faq');
Route::get('/privacy-policy', fn() => view('site.privacy-policy'))->name('privacy-policy');
Route::get('/terms-of-service', fn() => view('site.terms-of-service'))->name('terms-of-service');

// Admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Service Requests
    Route::resource('service-requests', AdminServiceRequestController::class)->except(['create', 'store']);

    // Contact Messages
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('contact-messages/{contact_message}/respond', [ContactMessageController::class, 'respond'])->name('contact-messages.respond');

    // Service Categories
    Route::resource('categories', ServiceCategoryController::class);

    // Services
    Route::resource('services', ServiceController::class);

    // Page Content
    Route::get('page-content', [PageContentController::class, 'index'])->name('page-content.index');
    Route::put('page-content', [PageContentController::class, 'update'])->name('page-content.update');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    // Blog Posts
    Route::resource('blog', BlogController::class);

    // Portfolio
    Route::resource('portfolio', AdminPortfolioController::class);

    // Trusted Clients
    Route::resource('trusted-clients', TrustedClientController::class);

    // Activity Logs
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Remove the old dashboard route — admin dashboard replaces it
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

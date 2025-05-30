<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\HeroParagraphController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;

// Visitor authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected visitor routes
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
    Route::get('/content/{slug}', [HomeController::class, 'show'])->name('content.show')->where('slug', '.*');
});

// Admin routes
Route::prefix('admin')->group(function () {
    // Login routes (only accessible to guests)
    Route::middleware('guest.admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    // Protected admin routes (only accessible to authenticated admins)
    Route::middleware('admin.auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // User Management Routes
        // Route::resource('users', UserController::class)->except(['show']);

         Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{cuser}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        
        // Categories Routes (maintaining original names)
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        
        // Keywords Routes (maintaining original names)
        Route::get('/keywords', [KeywordController::class, 'index'])->name('admin.keywords.index');
        Route::get('/keywords/create', [KeywordController::class, 'create'])->name('admin.keywords.create');
        Route::post('/keywords', [KeywordController::class, 'store'])->name('admin.keywords.store');
        Route::get('/keywords/{keyword}/edit', [KeywordController::class, 'edit'])->name('admin.keywords.edit');
        Route::put('/keywords/{keyword}', [KeywordController::class, 'update'])->name('admin.keywords.update');
        Route::delete('/keywords/{keyword}', [KeywordController::class, 'destroy'])->name('admin.keywords.destroy');
        
        // Contents Routes (maintaining original names)
        Route::get('/contents', [ContentController::class, 'index'])->name('admin.contents.index');
        Route::get('/contents/create', [ContentController::class, 'create'])->name('admin.contents.create');
        Route::post('/contents', [ContentController::class, 'store'])->name('admin.contents.store');
        Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('admin.contents.edit');
        Route::put('/contents/{content}', [ContentController::class, 'update'])->name('admin.contents.update');
        Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('admin.contents.destroy');
        
        // Hero Section Routes (maintaining original names)
        Route::get('/hero-section', [HeroSectionController::class, 'edit'])->name('admin.hero-section.edit');
        Route::put('/hero-section', [HeroSectionController::class, 'update'])->name('admin.hero-section.update');
        
        // Hero Paragraph Routes (maintaining original names)
        Route::get('/hero-paragraph', [HeroParagraphController::class, 'edit'])->name('admin.hero-paragraph.edit');
        Route::put('/hero-paragraph', [HeroParagraphController::class, 'update'])->name('admin.hero-paragraph.update');
    });
});
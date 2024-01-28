<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\KategoriBannerController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Backend
   Route::prefix('dashboard')->group(function (){
    // Banner
    Route::get('/banner-index', [BannerController::class, 'index'])->name('banner-index');
    Route::get('/banner-create', [BannerController::class, 'create'])->name('banner-create');
    Route::get('/banner-show/{id}', [BannerController::class, 'show'])->name('banner-show');
    Route::post('/banner-store', [BannerController::class, 'store'])->name('banner-store');
    Route::get('/banner-edit/{id}', [BannerController::class, 'edit'])->name('banner-edit');
    Route::put('/banner-update/{id}', [BannerController::class, 'update'])->name('banner-update');
    Route::delete('/banner-delete/{id}', [BannerController::class, 'destroy'])->name('banner-delete');

    // Banner Kategori
    Route::get('/kategori-banner-index', [KategoriBannerController::class, 'index'])->name('kategori-banner-index');
    Route::get('/kategori-banner-create', [KategoriBannerController::class, 'create'])->name('kategori-banner-create');
    Route::post('/kategori-banner-store', [KategoriBannerController::class, 'store'])->name('kategori-banner-store');
    Route::get('/kategori-banner-edit/{id}', [KategoriBannerController::class, 'edit'])->name('kategori-banner-edit');
    Route::put('/kategori-banner-update/{id}', [KategoriBannerController::class, 'update'])->name('kategori-banner-update');
    Route::delete('/kategori-banner-delete/{id}', [KategoriBannerController::class, 'destroy'])->name('kategori-banner-delete');

    // Kategori Produk
    Route::get('/product-kategori-index', [ProductCategoryController::class, 'index'])->name('product-kategori-index');
    Route::get('/product-kategori-create', [ProductCategoryController::class, 'create'])->name('product-kategori-create');
    Route::post('/product-kategori-store', [ProductCategoryController::class, 'store'])->name('product-kategori-store');
    Route::get('/product-kategori-edit', [ProductCategoryController::class, 'edit'])->name('product-kategori-edit');
    Route::put('/product-kategori-update/{id}', [ProductCategoryController::class, 'update'])->name('product-kategori-update');
    Route::delete('/product-kategori-delete/{id}', [ProductCategoryController::class, 'destroy'])->name('product-kategori-delete');

    //Produk
    Route::get('/product-index', [ProductController::class, 'index'])->name('product-index');
    Route::get('/product-create', [ProductController::class, 'create'])->name('product-create');
    Route::post('/product-store', [ProductController::class, 'store'])->name('product-store');
    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product-update/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');
   });

});


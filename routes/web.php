<?php

use App\Http\Controllers\{HomeController, UserController, FAQController, ContactController, ProfileController};
use Illuminate\Support\Facades\Route;

// Algemene routes
Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profielroutes zonder parameter
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin dashboard en rolbeheer
Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::post('/update-role', [UserController::class, 'updateRole'])->name('updateRole')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// FAQ routes
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/faq', [FAQController::class, 'index'])->name('admin.faq.index');
    Route::get('/faq/create', [FAQController::class, 'create'])->name('admin.faq.create');
    Route::post('/faq', [FAQController::class, 'store'])->name('admin.faq.store');
    Route::get('/faq/{id}/edit', [FAQController::class, 'edit'])->name('admin.faq.edit');
    Route::put('/faq/{id}', [FAQController::class, 'update'])->name('admin.faq.update');
    Route::delete('/faq/{id}', [FAQController::class, 'destroy'])->name('admin.faq.destroy');
});

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::post('/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');
});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::get('profile', [ProfileController::class, 'showProfile'])->middleware('auth');

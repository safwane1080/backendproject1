<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FAQController;


Route::get('/', [HomeController::class,'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::post('/update-role', [UserController::class, 'updateRole'])->name('updateRole')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/faq', [FAQController::class, 'index'])->name('admin.faq.index');
    Route::get('/faq/create', [FAQController::class, 'create'])->name('admin.faq.create');
    Route::post('/faq', [FAQController::class, 'store'])->name('admin.faq.store');
    Route::get('/faq/{id}/edit', [FAQController::class, 'edit'])->name('admin.faq.edit');
    Route::put('/faq/{id}', [FAQController::class, 'update'])->name('admin.faq.update');
    Route::delete('/faq/{id}', [FAQController::class, 'destroy'])->name('admin.faq.destroy');
});
Route::middleware(['auth'])->group(function() {
    Route::resource('faqs', FAQController::class)->middleware('admin');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('faq', FAQController::class)->except('show');
});
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
Route::get('/admin/faq/create', [FAQController::class, 'create'])->name('admin.faq.create');
Route::resource('faq', FAQController::class);




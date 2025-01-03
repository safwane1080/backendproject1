<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;



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



Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/contacts', [ContactController::class, 'index']);Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/contactforms', [ContactFormController::class, 'index'])->name('admin.contactforms.index');
        Route::get('/admin/contactforms/{id}', [ContactFormController::class, 'show'])->name('admin.contactforms.show');
        Route::post('/admin/contactforms/{id}/reply', [ContactFormController::class, 'reply'])->name('admin.contactforms.reply');
    });
    
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/contactforms', [ContactFormController::class, 'index'])->name('admin.contactforms.index');
    Route::get('/admin/contactforms/{id}', [ContactFormController::class, 'show'])->name('admin.contactforms.show');
    Route::post('/admin/contactforms/{id}/reply', [ContactFormController::class, 'reply'])->name('admin.contactforms.reply');
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::post('/admin/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Overzicht van de contactformulieren
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    // Route voor het beantwoorden van een contactformulier
    Route::post('/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
});


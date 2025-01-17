<?php

use App\Http\Controllers\{HomeController, UserController, FAQController, ContactController, ProfileController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;
use App\Models\News;
use App\Http\Controllers\SuggestedFaqController;




// Algemene routes
Route::get('/', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'index'])->name('home');


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
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
Route::put('/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::get('profile', [ProfileController::class, 'showProfile'])->middleware('auth');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logout');

Route::post('/profile/update', function (Request $request) {
    // Controleer of er een bestand is geüpload
    if ($request->hasFile('profile_image')) {
        // Sla het bestand op in de public map
        $request->file('profile_image')->store('public/profile_images');
    }
    
    // Verder verwerken van de gegevens (bijvoorbeeld opslaan in de database)
    return redirect()->back()->with('success', 'Profiel bijgewerkt!');
});


Route::get('/news', [NewsController::class, 'showNewsList'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'showNewsDetail'])->name('news.show');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});
Route::resource('news', NewsController::class);
Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');

// Publieke routes voor nieuws
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Admin routes voor nieuwsbeheer
Route::middleware(['auth', 'admin'])->prefix('admin/news')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/suggested-faqs', [SuggestedFaqController::class, 'store'])->name('suggested-faqs.store');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/suggested-questions', [SuggestedFaqController::class, 'index'])->name('admin.suggested-questions.index');
    Route::post('/suggested-questions/{id}/update-status', [SuggestedFaqController::class, 'updateStatus'])->name('admin.suggested-questions.update-status');
});

use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

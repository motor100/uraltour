<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/catalog', [MainController::class, 'catalog']);

Route::get('/catalog/{category}', [MainController::class, 'category']);

Route::get('/catalog/{category}/{product}', [MainController::class, 'product']);

Route::get('/contacts', [MainController::class, 'contacts']);



Route::get('/privacy-policy', [MainController::class, 'privacy_policy']);

Route::get('/agreement', [MainController::class, 'agreement']);

Route::get('/sitemap.xml', [MainController::class, 'sitemap']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');

Route::get('/catalog/{category}', [MainController::class, 'category']);

Route::get('/catalog/{category}/{product}', [MainController::class, 'product']);

Route::get('/contacts', [MainController::class, 'contacts']);

Route::get('/poisk', [MainController::class, 'poisk']);

Route::get('/documents', [MainController::class, 'documents']);

Route::get('/testimonials', [MainController::class, 'testimonials']);

Route::get('/booking', [MainController::class, 'booking']);


Route::get('/privacy-policy', [MainController::class, 'privacy_policy']);

Route::get('/agreement', [MainController::class, 'agreement']);

Route::get('/sitemap.xml', [MainController::class, 'sitemap']);


Route::get('/ajax-product-search', [AjaxController::class, 'product_search']);

Route::post('/ajax-callback', MailerController::class);

Route::post('/ajaxaddtestimonial', [AjaxController::class, 'add_testimonial']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');

    // Products
    Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.products');

    Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('dashboard.products-create');

    Route::post('/dashboard/products/store', [ProductController::class, 'store'])->name('dashboard.products-store');

    Route::get('/dashboard/products/{id}/edit', [ProductController::class, 'edit'])->name('dashboard.products-edit');

    Route::post('/dashboard/products/{id}/update', [ProductController::class, 'update'])->name('dashboard.products-update');

    Route::get('/dashboard/products/{id}/destroy', [ProductController::class, 'destroy'])->name('dashboard.products-destroy');

    // testimonials
    Route::get('/dashboard/testimonials', [TestimonialController::class, 'index'])->name('dashboard.testimonials');

    // Route::get('/dashboard/testimonials/create', [ProductController::class, 'create'])->name('dashboard.testimonials-create');

    // Route::post('/dashboard/testimonials/store', [ProductController::class, 'store'])->name('dashboard.testimonials-store');

    // Route::get('/dashboard/testimonials/{id}/edit', [ProductController::class, 'edit'])->name('dashboard.testimonials-edit');

    Route::post('/dashboard/testimonials/{id}/update', [TestimonialController::class, 'update'])->name('dashboard.testimonials-update');

    Route::get('/dashboard/testimonials/{id}/destroy', [TestimonialController::class, 'destroy'])->name('dashboard.testimonials-destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Create/update/delete users routes
 * Middleware alias role
 * Middleware role:administrator
 *
 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
 */
Route::middleware(['auth', 'role:administrator'])->group(function() {

    Route::get('/dashboard/users', [UserController::class, 'index']);

    Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('users-create');

    Route::post('/dashboard/users/store', [UserController::class, 'store'])->name('users-store');

    Route::get('/dashboard/users/{id}', [UserController::class, 'show'])->name('users-show');

    Route::get('/dashboard/users/{id}/edit', [UserController::class, 'edit'])->name('users-edit');

    Route::post('/dashboard/users/update', [UserController::class, 'update'])->name('users-update');

    Route::get('/dashboard/users/{id}/destroy', [UserController::class, 'destroy'])->name('users-destroy');

    Route::post('/dashboard/users/password', [UserController::class, 'password'])->name('users-password');
    
});



require __DIR__.'/auth.php';

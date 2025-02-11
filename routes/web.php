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
use App\Http\Controllers\Admin\RecommendationController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductArchiveController;
use App\Http\Controllers\Admin\SelectionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');

Route::get('/catalog/{category}', [MainController::class, 'category'])->name('category');

Route::get('/catalog/{category}/{product}', [MainController::class, 'product']);

Route::get('/contacts', [MainController::class, 'contacts']);

Route::get('/poisk', [MainController::class, 'poisk']);

Route::get('/documents', [MainController::class, 'documents']);

Route::get('/testimonials', [MainController::class, 'testimonials']);

Route::get('/booking', [MainController::class, 'booking']);

Route::get('/selections', [MainController::class, 'selections']);

Route::get('/selections/{selection}', [MainController::class, 'selection']);


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

    // Testimonials
    Route::get('/dashboard/testimonials', [TestimonialController::class, 'index'])->name('dashboard.testimonials');

    Route::post('/dashboard/testimonials/{id}/update', [TestimonialController::class, 'update'])->name('dashboard.testimonials-update');

    Route::get('/dashboard/testimonials/{id}/destroy', [TestimonialController::class, 'destroy'])->name('dashboard.testimonials-destroy');

    // Recommendations
    Route::get('/dashboard/recommendations', [RecommendationController::class, 'index'])->name('dashboard.recommendations');

    Route::get('/dashboard/recommendations/create', [RecommendationController::class, 'create'])->name('dashboard.recommendations-create');

    Route::post('/dashboard/recommendations/store', [RecommendationController::class, 'store'])->name('dashboard.recommendations-store');

    Route::get('/dashboard/recommendations/{id}', [RecommendationController::class, 'show'])->name('dashboard.recommendations-show');

    Route::get('/dashboard/recommendations/{id}/edit', [RecommendationController::class, 'edit'])->name('dashboard.recommendations-edit');

    Route::post('/dashboard/recommendations/{id}/update', [RecommendationController::class, 'update'])->name('dashboard.recommendations-update');

    Route::get('/dashboard/recommendations/{id}/destroy', [RecommendationController::class, 'destroy'])->name('dashboard.recommendations-destroy');

    // Payments
    Route::get('/dashboard/payments', [PaymentController::class, 'index'])->name('dashboard.payments');

    Route::get('/dashboard/payments/create', [PaymentController::class, 'create'])->name('dashboard.payments-create');

    Route::post('/dashboard/payments/store', [PaymentController::class, 'store'])->name('dashboard.payments-store');

    Route::get('/dashboard/payments/{id}', [PaymentController::class, 'show'])->name('dashboard.payments-show');

    Route::get('/dashboard/payments/{id}/edit', [PaymentController::class, 'edit'])->name('dashboard.payments-edit');

    Route::post('/dashboard/payments/{id}/update', [PaymentController::class, 'update'])->name('dashboard.payments-update');

    Route::get('/dashboard/payments/{id}/destroy', [PaymentController::class, 'destroy'])->name('dashboard.payments-destroy');

    // Products archive
    Route::get('/dashboard/products-archive', [ProductArchiveController::class, 'index'])->name('dashboard.products-archive');

    Route::get('/dashboard/products-archive/{id}', [ProductArchiveController::class, 'show'])->name('dashboard.products-archive-show');

    Route::get('/dashboard/products-archive/{id}/restore', [ProductArchiveController::class, 'restore'])->name('dashboard.products-archive-restore');

    // Selections
    Route::get('/dashboard/selections', [SelectionController::class, 'index'])->name('dashboard.selections');

    Route::get('/dashboard/selections/{id}/edit', [SelectionController::class, 'edit'])->name('dashboard.selections-edit');

    Route::post('/dashboard/selections/{id}/update', [SelectionController::class, 'update'])->name('dashboard.selections-update');

    // Selection product удаление товара из подборки
    Route::get('/dashboard/selection-product/{id}/destroy', [AdminController::class, 'selection_product_destroy'])->name('dashboard.selection-product-destroy');

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

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdOrderController;
use App\Http\Controllers\User\UserTicketController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\CryptoPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('config:clear');
   Artisan::call('view:clear');
   Artisan::call('optimize');

   return "Cache cleared successfully";
});

Route::get('/payment/create', [\App\Http\Controllers\User\PaymentController::class, 'checkoutWithCrypto'])->name('payment.create');
Route::get('/payment/callback', [\App\Http\Controllers\User\PaymentController::class, 'callback'])->name('payment.callback');

Route::get('/api', [ApiDataController::class, 'index']);
Route::get('/data', [ApiDataController::class, 'fetchAndStoreData']);
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
Route::get('/test', [SiteController::class, 'test'])->name('test');
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/social-media', [SiteController::class, 'social'])->name('social');
Route::get('/seo', [SiteController::class, 'seo'])->name('seo');
Route::get('/email-marketing', [SiteController::class, 'email'])->name('email');
Route::get('/site-mobile', [SiteController::class, 'site'])->name('site');
Route::get('/video', [SiteController::class, 'video'])->name('video');
Route::get('/projects', [SiteController::class, 'projects'])->name('projects');
Route::get('/sudio', [SiteController::class, 'sudio'])->name('sudio');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/projects', [SiteController::class, 'project'])->name('project');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/o/{slug}', [LinkController::class, 'openLink'])->name("open_link");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('user')->name('user.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('orders', \App\Http\Controllers\User\OrderController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('tickets', UserTicketController::class);
    Route::resource('campaigns', \App\Http\Controllers\User\CampaignsController::class);
    Route::post('/tickets/{id}/reply', [UserTicketController::class, 'respond'])->name('tickets.reply');
    Route::post('/tickets/{id}/status', [UserTicketController::class, 'updateStatus'])->name('tickets.updateStatus');
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\User\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('payments', \App\Http\Controllers\User\PaymentController::class)->only(['index', 'show']);
    Route::get('/checkout/{order}', [\App\Http\Controllers\User\PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/payment/callback', [\App\Http\Controllers\User\PaymentController::class, 'callback'])->name('payment.callback');
    Route::get('/checkout/crypto/{order}', [\App\Http\Controllers\User\PaymentController::class, 'checkoutWithCrypto'])->name('crypto.checkout');
    Route::get('/payment/crypto/callback', [\App\Http\Controllers\User\PaymentController::class, 'cryptocallback'])->name('crypto.callback');
    Route::get('/categories/{slug}', [\App\Http\Controllers\User\CategoryController::class, 'show'])->name('categories.show');
    Route::resource('/orders', \App\Http\Controllers\User\OrderController::class)->only(['index', 'store']);
    Route::post('/orders/{order}/add-product', [\App\Http\Controllers\User\OrderController::class, 'addProduct'])->name('orders.add-product');
    Route::get('/products', [\App\Http\Controllers\User\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/search', [\App\Http\Controllers\User\ProductController::class, 'search'])->name('products.search');
    Route::get('/products/{slug}', [\App\Http\Controllers\User\ProductController::class, 'show'])->name('products.show');
    Route::post('/products/{productId}/order', [\App\Http\Controllers\User\ProductController::class, 'order'])->name('products.order');
    Route::post('/user/orders/apply-discount', [\App\Http\Controllers\User\DiscountController::class, 'apply'])->name('orders.apply-discount');
    Route::resource('invoices', \App\Http\Controllers\User\InvoiceController::class)->only(['index', 'show', 'destroy']);
    Route::get('/invoices/{invoice}/download-pdf', [App\Http\Controllers\User\InvoiceController::class, 'downloadPdf'])
    ->name('invoices.download-pdf');
    Route::post('/orders/{order}/create-invoice', [\App\Http\Controllers\User\OrderController::class, 'createInvoice'])
    ->name('orders.create-invoice');
    Route::get('/affiliate/dashboard', [App\Http\Controllers\User\AffiliateController::class, 'dashboard'])->name('affiliate.dashboard');
    Route::get('/affiliate/referral', [App\Http\Controllers\User\AffiliateController::class, 'referral'])->name('affiliate.referral');
    Route::get('/affiliate/transactions', [App\Http\Controllers\User\AffiliateController::class, 'transactions'])->name('affiliate.transactions');
    Route::get('/search', [\App\Http\Controllers\User\ProductSearchController::class, 'search'])->name('search');
    Route::get('/campaign/load-categories', [App\Http\Controllers\User\CampaignsController::class, 'loadCategories'])->name('campaigns.loadCategories');
    Route::get('/campaign/load-products', [App\Http\Controllers\User\CampaignsController::class, 'loadProducts'])->name('campaigns.loadProducts');
    Route::get('/campaign/checkout/{campaign}', [App\Http\Controllers\User\CampaignsController::class, 'checkout'])->name('campaigns.checkout');
    Route::get('/campaign/payment/callback', [\App\Http\Controllers\User\CampaignsController::class, 'paymentCallback'])->name('campaigns.callback');
    Route::get('/campaign/checkout/crypto/{campaign}', [\App\Http\Controllers\User\CampaignsController::class, 'checkoutWithCrypto'])->name('campaigns.crypto.checkout');
    Route::get('/campaign/payment/crypto/callback', [\App\Http\Controllers\User\CampaignsController::class, 'cryptocallback'])->name('campaigns.crypto.callback');
    Route::get('/campaign/example', [\App\Http\Controllers\User\CampaignsController::class, 'example'])->name('campaigns.example');
    Route::delete('/campaign/{campaign}/products/{product}/delete', [CampaignController::class, 'removeProduct'])->name('campaigns.products.delete');

});
Route::group(['prefix' => config('app.admin_dir'), 'namespace' => 'Auth'], function () {
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login','LoginController@login')->name('admin_login');

});
require __DIR__.'/auth.php';
Route::prefix('admin')->name('admin.')->middleware(['auth', 'AdminCheck'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
    Route::get('/dashboard/analytics', [\App\Http\Controllers\Admin\DashboardController::class, 'analytics'])->name('dashboard.analytics');
    Route::get('/users', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');
    Route::get('/url', [LinkController::class, 'show'])->name('url');
    Route::post('/request-link', [LinkController::class, 'requestLink'])->name("request_link");
    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/campaign', \App\Http\Controllers\Admin\CampaignController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::get('/payments', [\App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');
    Route::put('/payments/{payment}/status', [\App\Http\Controllers\Admin\PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
    Route::resource('discounts', \App\Http\Controllers\Admin\DiscountController::class);
    Route::resource('invoices', \App\Http\Controllers\Admin\InvoiceController::class)->only(['index', 'show', 'destroy']);
    Route::get('/invoices/{invoice}/download-pdf', [App\Http\Controllers\Admin\InvoiceController::class, 'downloadPdf'])
    ->name('invoices.download-pdf');
    Route::post('/orders/{order}/create-invoice', [\App\Http\Controllers\Admin\OrderController::class, 'createInvoice'])
    ->name('orders.create-invoice');
    Route::resource('tickets', App\Http\Controllers\Admin\TicketController::class);
    Route::post('/tickets/{id}/status', [App\Http\Controllers\Admin\TicketController::class, 'updateStatus'])->name('tickets.updateStatus');
    Route::post('tickets/{ticketId}/respond', [App\Http\Controllers\Admin\TicketController::class, 'respond'])->name('tickets.respond');
    Route::get('/notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{id}/mark-as-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});

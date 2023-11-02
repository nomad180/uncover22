<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TdeeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

//Pages
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/coaching', [PageController::class, 'uncover'])->name('coaching');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

//TDEE
Route::get('/tdee', [TdeeController::class, 'index'])->name('tdee');
Route::post('/tdee', [TdeeController::class, 'calculateTdee'])->name('tdeeresult');

//Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'mailContactForm'])->name('contact.post');

//Signup Form for Program Information
Route::post('newsletter', NewsletterController::class);

//Blog
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//Member Signup & Member Routing
Route::middleware(['auth', 'verified', 'nonPayingCustomer'])->group(function () {
    Route::get('/charge', [MemberController::class, 'show'])->name('charge');
    Route::post('/charge', [MemberController::class, 'chargepost'])->name('charge.post');
});
Route::middleware(['auth', 'verified', 'payingCustomer'])->group(function () {
    Route::get('/dashboard', [MemberController::class, 'dashboard'])->name('dashboard');
    Route::get('/uncoveryourfit', [MemberController::class, 'uncoveryourfit'])->name('uncoveryourfit');
});

//Member Profile
Route::middleware(['auth', 'payingCustomer'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//TinyMCE Image File Manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

require __DIR__.'/auth.php';

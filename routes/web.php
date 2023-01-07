<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/damon', [PageController::class, 'damon'])->name('damon');
Route::get('/program', [PageController::class, 'uncover'])->name('program');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::post('newsletter', NewsletterController::class);

Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::middleware(['auth', 'verified', 'nonPayingCustomer'])->group(function () {
    Route::get('/charge', [MemberController::class, 'show'])->name('charge');
    Route::post('/charge', [MemberController::class, 'chargepost'])->name('charge.post');
});
Route::middleware(['auth', 'verified', 'payingCustomer'])->group(function () {
    Route::get('/dashboard', [MemberController::class, 'dashboard'])->name('dashboard');
    Route::get('/uncoveryourfit', [MemberController::class, 'uncoveryourfit'])->name('uncoveryourfit');
});


Route::middleware(['auth', 'payingCustomer'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

require __DIR__.'/auth.php';

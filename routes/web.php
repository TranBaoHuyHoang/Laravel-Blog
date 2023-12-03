<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/frontend/login', [FrontendController::class, 'login'])->name('front.login');
Route::post('/frontend/login', [FrontendController::class, 'Userlogin'])->name('front.Userlogin');
Route::get('/frontend/logout', [FrontendController::class, 'logout'])->name('front.logout');
Route::get('/frontend/register', [FrontendController::class, 'register'])->name('front.register');
Route::post('/frontend/register', [FrontendController::class, 'Userregister'])->name('front.Userregister');
Route::get('/post-detail/{post}', [FrontendController::class, 'post_detail'])->name('front.post_detail');
Route::get('/all-post', [FrontendController::class, 'all_post'])->name('front.all_post');
Route::get('/search', [FrontendController::class, 'search'])->name('front.search');
Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('front.category');
Route::get('/tag/{tag}', [FrontendController::class, 'tag'])->name('front.tag');
Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::resource('/comment', CommentController::class);
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin', [BackendController::class, 'index'])->name('back.index');
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/sub-category', SubCategoryController::class);
    Route::get('/admin/get-subcategory/{id}', [SubCategoryController::class , 'getSubCategoryByCategoryId']);
    Route::resource('/admin/tag', TagController::class);
    Route::resource('/admin/post', PostController::class);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

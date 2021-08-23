<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('danh-muc/xoa/{id}', [HomeController::class, 'removeCate'])->name('cate.remove');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginAdd']);
Route::get('registration', [LoginController::class, 'registration'])->name('registration');
Route::post('registration', [LoginController::class, 'registrationAdd']);
Route::any('logout', [LoginController::class, 'logout'])->name('logout');

// Route::prefix('users')->group(function () {
//     Route::get('/layout', [PageController::class, 'index'])->name('users.layout');
// });
Route::get('/', [PageController::class, 'index'])->name('users.page.index');
Route::get('category/{id}', [PageController::class, 'Category'])->name('users.page.category');
Route::get('detail/{id}', [PageController::class, 'detail'])->name('users.page.detail');
Route::post('comment/{id}', [CommentController::class, 'CommentAdd']);
Route::get('cart', [PageController::class, 'getCart'])->name('users.page.cart')->middleware('check_login');
Route::get('AddCart/{id}', [PageController::class, 'getAddCart']);
Route::get('deleteCart/{id}', [PageController::class, 'deleteCart']);
Route::get('Order', [PageController::class, 'Order'])->name('users.page.order');
Route::post('AddOrder', [PageController::class, 'AddOrder']);

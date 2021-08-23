<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['check_login'])->group(function () {
    Route::middleware(['check_admin'])->group(function () {
        Route::prefix('san-pham')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            Route::get('create', [ProductController::class, 'create'])->name('product.create');
            Route::post('create', [ProductController::class, 'createAdd']);
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('edit/{id}', [ProductController::class, 'editAdd']);
            Route::post('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        });
        Route::prefix('danh-muc')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            Route::get('create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('create', [CategoryController::class, 'createAdd'])->name('category.createAdd');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('edit/{id}', [CategoryController::class, 'editAdd']);
            Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
        });
        Route::prefix('tin-tuc')->group(function () {
            Route::get('/', [NewController::class, 'index'])->name('new.index');
            Route::get('create', [NewController::class, 'create'])->name('new.create');
            Route::post('create', [NewController::class, 'createAdd'])->name('new.createAdd');
            Route::get('edit/{id}', [NewController::class, 'edit'])->name('new.edit');
            Route::post('edit/{id}', [NewController::class, 'editAdd']);
            Route::post('delete/{id}', [NewController::class, 'delete'])->name('new.delete');
            // Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
        });
        Route::prefix('tai-khoan')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('account.index');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('account.edit');
            Route::post('edit/{id}', [UserController::class, 'editAdd']);
            Route::post('delete/{id}', [UserController::class, 'delete'])->name('account.delete');
            Route::get('user_order/{id}', [UserController::class, 'UserOrder'])->name('account.user_order');
        });
        Route::prefix('binh-luan')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('comment.index');
            Route::post('delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
            // Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
        });
        Route::prefix('don-hang')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('order.index');
            Route::get('BillDetail/{id}', [OrderController::class, 'BillDetail'])->name('order.bill_detail');
            Route::post('delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
            // Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
        });
    });
});

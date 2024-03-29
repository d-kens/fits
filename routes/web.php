<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


// Admin Routes
Route::prefix('admin')->group(function() {
    // analytics routes
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // subcategory routes
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('/subcategories/{categoryId}', [SubCategoryController::class, 'getSubcategoriesByCategoryId'])->name('subcategories-by-catgeoryid');
    Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('admin.subcategory.show');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::put('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::delete('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');

    // product routes
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    // token routes
});

// User Routes
Route::prefix('user')->group(function() {

});


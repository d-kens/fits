<?php

use App\Http\Controllers\Admin\CategoryController;
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
        return view('admin.dashboard'); // ! To work on this later
    })->name('admin.dashboard');

    // category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // subcategory routes
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('admin.subcategory.show');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::put('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::delete('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');

    // product routes

    // user routes

    // token routes
});

// User Routes
Route::prefix('user')->group(function() {

});


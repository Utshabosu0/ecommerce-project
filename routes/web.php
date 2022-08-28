<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;

Route::get('/',[FrontendController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin', function(){
    return view('backend.dashboard');
})->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product-pdf', [PdfController::class, 'downloadProductData'])->name('product.pdf');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    
        //trash list route
        Route::get('/trashlist', [ProductController::class, 'trashList'])->name('product.trashlist');
        Route::get('/restore/{id}', [ProductController::class, 'restoreProduct'])->name('product.restore');
        Route::delete('/delete/{id}', [ProductController::class, 'forceDelete'])->name('product.forcedelete');
    
        // excel export route 
        Route::get('/product_export', [ProductController::class, 'export'])->name('product.excel');
    });
    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/catgory-products/{id}', [CategoryController::class, 'categoryProducts'])->name('categories.products');

        // trash Items Routes 
        Route::get('/trashlist',  [CategoryController::class, 'trashList'])->name('category.trashlist');
        Route::get('/restore/{id}', [CategoryController::class, 'restoreItem'])->name('category.restore');
        Route::delete('/force_delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });
  

        Route::get('/profile', [ProfileController::class, 'getProfile'])->name('user.profile');
        Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('user.profile_update');
        Route::get('/users', [UserController::class, 'index'])->name('user.index');



        Route::prefix('color')->group(function(){
            Route::get('/', [ColorController::class, 'index'])->name('color.index');
            Route::get('/create', [ColorController::class, 'create'])->name('color.create');
            Route::post('/store', [ColorController::class, 'store'])->name('color.store');
            Route::get('edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
            Route::post('update/{id}', [ColorController::class, 'update'])->name('color.update');
            Route::delete('/delete/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
        });

});



// Relationship   
// Many TO Many  
// One to One --- user  & profile 
// One TO Many  ----   color & Product   ---- 

// Many To Many   ----     Product   &   Color 

// pivote table    color_product














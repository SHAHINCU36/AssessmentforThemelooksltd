<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use\App\Http\Controllers\Products\productsController;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::resource('user',UserController::class);

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function (){


    Route::get('/manage_products', [productsController::class, 'index'])->name('manage_products');
    Route::get('/addproduct', [productsController::class, 'create'])->name('addproducts');
    Route::get('/get-sub-category-by-category-id', [productsController::class, 'getSubCategoryId'])->name('get-sub-category-by-category-id');
    Route::post('/storeproduct', [productsController::class, 'store'])->name('storeproduct');
    Route::post('/updateproduct/{id}', [productsController::class, 'Update'])->name('updateproduct');
    Route::get('/show_product_by_id/{id}', [productsController::class, 'ShowProductById'])->name('show_product_by_id');
    Route::get('/edit_product_by_id/{id}', [productsController::class, 'EditProductById'])->name('edit_product_by_id');
    Route::post('/delete_product_by_id/{id}', [productsController::class, 'DeleteProductById'])->name('delete_product_by_id');

});
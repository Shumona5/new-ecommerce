<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

Route::get('/categories',[CategoriesController::class,'list'])->name('categories.list');
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
Route::get('/categories/edit',[CategoriesController::class,'edit'])->name('categories.edit');
Route::post('/categories/update',[CategoriesController::class,'update'])->name('categories.update');
Route::get('/categories/delete',[CategoriesController::class,'delete'])->name('categories.delete');

Route::get('/brand',[BrandController::class,'list'])->name('brand.list');
Route::get('/create/brand',[BrandController::class,'create'])->name('brand.create');
Route::post('/store/brand',[BrandController::class,'store'])->name('brand.store');

Route::get('order',[OrderController::class,'list'])->name('order.list');
Route::get('product',[ProductController::class,'list'])->name('product.list'); 
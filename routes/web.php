<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebHomeController;
use App\Models\Category;
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

Route::get('/',[WebHomeController::class,'home'])->name('web.home');

Route::get('/login',[UserController::class,'login'])->name('admin.login');
Route::post('/login/store',[UserController::class,'doLogin'])->name('admin.doLogin');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');


Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

Route::get('/categories',[CategoriesController::class,'list'])->name('categories.list');
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');

Route::get('/brand',[BrandController::class,'list'])->name('brand.list');
Route::get('/create/brand',[BrandController::class,'create'])->name('brand.create');
Route::post('/store/brand',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::put('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

Route::get('order',[OrderController::class,'list'])->name('order.list');

Route::get('/product',[ProductController::class,'list'])->name('product.list'); 
Route::get('/product/create',[ProductController::class,'create'])->name('product.create'); 
Route::post('/product/store',[ProductController::class,'store'])->name('product.store'); 
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit'); 
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update'); 
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

Route::get('/user',[UserController::class,'list'])->name('user.list');
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');

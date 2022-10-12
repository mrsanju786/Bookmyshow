<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SubCategoryController;

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

Auth::routes();

Route::group(['middleware' => 'auth','is_admin'], function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

//subcategory
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/{id}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/subcategory/{id}/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::get('/subcategory/{id}/delete', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');

//city
Route::get('/city', [CityController::class, 'index'])->name('city.index');
Route::get('/city/create', [CityController::class, 'create'])->name('city.create');
Route::post('/city/store', [CityController::class, 'store'])->name('city.store');
Route::get('/city/{id}/edit', [CityController::class, 'edit'])->name('city.edit');
Route::post('/city/{id}/update', [CityController::class, 'update'])->name('city.update');
Route::get('/city/{id}/delete', [CityController::class, 'destroy'])->name('city.delete');

//Banner
Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
Route::post('/banner/{id}/update', [BannerController::class, 'update'])->name('banner.update');
Route::get('/banner/{id}/delete', [BannerController::class, 'destroy'])->name('banner.delete');

//Events
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/{id}/update', [EventController::class, 'update'])->name('event.update');
Route::get('/event/{id}/delete', [EventController::class, 'destroy'])->name('event.delete');


});
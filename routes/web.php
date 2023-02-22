<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('admin/dashboard', 'Index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/all-category', 'Index')->name('allcategory');
        Route::get('admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('admin/store-category', 'StoreCatetgory')->name('storecategory');
        Route::get('admin/edit-category/{id}', 'EditCatetgory')->name('editcategory');
        Route::get('admin/delete-category/{id}', 'DeleteCatetgory')->name('deletecategory');
        Route::post('admin/update-category', 'UpdateCatetgory')->name('updatecategory');
    });
    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('admin/add-subcategory', 'AddSubategory')->name('addsubcategory');
        Route::post('admin/store-subcategory', 'StoreSubategory')->name('storesubcategory');
        Route::get('admin/edit-subcategory/{id}', 'EditSubcategory')->name('editsubcategory');
        Route::get('admin/delete-subcategory/{id}', 'DeleteSubcategory')->name('deletesubcategory');
        Route::post('admin/update-subcategory', 'UpdateSubcategory')->name('updatesubcategory');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('admin/all-products', 'Index')->name('allproducts');
        Route::get('admin/add-product', 'AddProduct')->name('addproduct');
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('admin/pending-orders', 'Index')->name('pendingorders');
    });
});


require __DIR__.'/auth.php';

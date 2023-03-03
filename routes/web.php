<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'Index')->name('home');
});
Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/subcategory/{id}/{slug}', 'SubCategoryPage')->name('subcategory');
    Route::get('/product-info/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelase');


});

Route::middleware('auth', 'role:user')->group(function(){
    Route::controller(ClientController::class)->group(function(){
         Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
         Route::post('/add-product-cart', 'AddProductCart')->name('addproductcart');
         Route::get('/remove-product-cart/{id}', 'RemoveCart')->name('removeproduct');
         Route::get('/shipping-address', 'ShippingAddress')->name('shippingaddress');
         Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
         Route::get('/checkout', 'CheckOut')->name('checkout');
         Route::post('/place-order', 'PlaceOrder')->name('placeorder');
         Route::get('/user-profile', 'UserProfile')->name('userprofile');
         Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorder');
         Route::get('/user-profile/history', 'History')->name('history');
         Route::get('/today-deal', 'TodayDeal')->name('todaydeal');
         Route::get('/customer-service', 'CustomerService')->name('customerservice');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard'); 

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCatetgory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCatetgory')->name('editcategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCatetgory')->name('deletecategory');
        Route::post('/admin/update-category', 'UpdateCatetgory')->name('updatecategory');
    });
    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubcategory')->name('editsubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubcategory')->name('deletesubcategory');
        Route::post('/admin/update-subcategory', 'UpdateSubcategory')->name('updatesubcategory');
        Route::post('/admin/product/subcategorylist', 'GetSubcategory');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/edit-product-img/{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending-orders', 'Index')->name('pendingorders');
        Route::get('/admin/confirm-orders/{id}', 'ConfirmOrders')->name('confirmorder');
        Route::get('/admin/compeleted-orders', 'CompletedOrders')->name('completedorders');

    });
});


require __DIR__.'/auth.php';

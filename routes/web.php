<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\user\WishlistController;
use App\Http\Controllers\front\CartPageController;
use App\Models\user;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('admin:admin')->group(function(){
    route::get('admin/login',[AdminController::class,'loginForm']);
    route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});


//admin route

Route::prefix('admin/')->group(function(){

route::get('logout',[AdminController::class,'destroy'])->name('admin.logout');
route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
route::get('edit-profile',[AdminController::class,'editProfile'])->name('admin.editProfile');
route::post('updateprofile',[AdminController::class,'updateprofile'])->name('admin.update_profile');
route::get('change_password',[AdminController::class,'change_password'])->name('admin.change_password');
route::post('update_password',[AdminController::class,'update_password'])->name('admin.update_password');


//brand controller
route::get('brand',[BrandController::class,'index'])->name('admin.brand');
route::post('brand/store',[BrandController::class,'store'])->name('admin.brand.store');
route::get('brand/edit/{id}',[BrandController::class,'edit_brand'])->name('admin.brand.edit');
route::post('brand/update/{id}',[BrandController::class,'update_brand'])->name('admin.brand.update');
route::get('brand/delete/{id}',[BrandController::class,'delete_brand'])->name('admin.brand.delete');

// category all route


    route::prefix('category/')->group(function(){

        route::get('view',[CategoryController::class,'index'])->name('category.list');
         route::get('add',[CategoryController::class,'add'])->name('category.add');
        route::post('store',[CategoryController::class,'store'])->name('category.store');
        route::get('edit/{id}',[CategoryController::class,'edit_category'])->name('category.edit');
        route::post('update',[CategoryController::class,'update_category'])->name('category.update');
        route::get('delete/{id}',[CategoryController::class,'delete_category'])->name('category.delete');

    });

    // category all route


    route::prefix('subcategory/')->group(function(){

        route::get('view',[SubCategoryController::class,'index'])->name('subcategory.list');
         route::get('add',[SubCategoryController::class,'add'])->name('subcategory.add');
        route::post('store',[SubCategoryController::class,'store'])->name('subcategory.store');
        route::get('edit/{id}',[SubCategoryController::class,'edit_category'])->name('subcategory.edit');
        route::post('update',[SubCategoryController::class,'update_category'])->name('subcategory.update');
        route::get('delete/{id}',[SubCategoryController::class,'delete_category'])->name('subcategory.delete');

    });

   //subsubcategory route

     route::prefix('subsubcategory/')->group(function(){
        route::get('view',[SubCategoryController::class,'subsubcategory'])->name('subsubcategory.list');
        route::get('add',[SubCategoryController::class,'subsubcategorystore'])->name('subsubcategory.add');
        route::get('category/ajax/{category_id}',[SubCategoryController::class,'ajaxsubcategory']);
        route::post('add/store',[SubCategoryController::class,'sub_subcat_store'])->name('subsubcategory.store');

        route::get('edit/{id}',[SubCategoryController::class,'sub_subcat_edit']);
         
          route::post('update/{id}',[SubCategoryController::class,'sub_subcat_update']);

        route::get('delete/{id}',[SubCategoryController::class,'sub_subcat_delete']);
     });


      route::prefix('product/')->group(function(){

        route::get('add-product',[ProductController::class,'addProduct'])->name('product-add');

        route::get('subsubcategory/ajax/{subcategory_id}',[SubCategoryController::class,'ajaxsubsubcategory']);
        route::post('/add',[ProductController::class,'store'])->name('addproduct');
        route::get('/view',[ProductController::class,'view_product'])->name('manage.product');

        route::get('/edit/{id}',[ProductController::class,'edit_product'])->name('product.edit');

        route::post('/update/{id}',[ProductController::class,'update_product'])->name('updateproduct');

        route::post('/image_update',[ProductController::class,'image'])->name('image.update');
        route::get('/delete/{id}',[ProductController::class,'product_delete'])->name('product.delete');



    });

    route::prefix('slider/')->group(function(){
      route::get('/view',[SliderController::class,'index'])->name('slider.view');
      route::get('/add',[SliderController::class,'addshow'])->name('slider.add');
      route::post('/store',[SliderController::class,'store'])->name('slider.store');
      route::get('/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
      route::post('/update/{id}',[SliderController::class,'update'])->name('slider.update');
      route::get('/delete/{id}',[SliderController::class,'delete'])->name('slider.delete');
    });

});





// Front route
route::get('/',[IndexController::class,'index']);
route::get('user/logout',[IndexController::class,'destroy'])->name('user.logout');
route::get('user/profile',[IndexController::class,'profile'])->name('user.profile');
route::post('user/profile/store',[IndexController::class,'update_profile'])->name('user.profile.store');
route::get('user/change/password',[IndexController::class,'change_password'])->name('change.password');
route::post('user/update/password',[IndexController::class,'update_password'])->name('user.update.password');
// prduct details route
route::get('product/details/{id}/{slug}',[IndexController::class,'details']);
// product tag wise
route::get('product/tag/{tag}',[IndexController::class,'TagWiseProduct']);
// product add to card modal
route::get('/product/view/modal/{id}',[IndexController::class,'productviewajax']);
//add to card data
route::post('/cart/data/store/{id}',[CartController::class,'AddToCard']);
//add to mini cart
route::get('/product/mini/cart',[CartController::class,'Addminicard']);
//remove to mini cart
route::get('/miniCart/product-remove/{id}',[CartController::class,'RemoveMiniCart']);

// add to wishlist
route::post('/add-to-wishlist/{product_id}',[CartController::class,'addToWishlist']);


Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'user'],function(){

//Show wishlist Product

route::get('/view/wishlist',[WishlistController::class,'view_wishlist'])->name('wishlist');
// get wish list data
route::get('/get-wishlist-product',[WishlistController::class,'getWishlistData']);
// remove from wishlist
route::get('/wishlist/product-remove/{id}',[WishlistController::class,'wishlistRemove']);

});

// cart all route here

route::get('/mycart',[CartPageController::class,'mycart'])->name('mycart');
route::get('/user/get-cart-product',[CartPageController::class,'getCartProduct']);
route::get('/user/cart/product-remove/{rowId}',[CartPageController::class,'cartRemove']);
route::get('/cart-increment/{rowId}',[CartPageController::class,'cartIncrement']);
route::get('/cart-decrement/{rowId}',[CartPageController::class,'cartDecrement']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = user::find(Auth::user()->id);
        return view('dashboard',compact('user'));
    })->name('user.dashboard');
});

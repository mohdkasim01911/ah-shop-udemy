<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\user\WishlistController;
use App\Http\Controllers\front\CartPageController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\admin\CoupanController;
use App\Http\Controllers\admin\ShipingController;
use App\Http\Controllers\user\StripeController;
use App\Http\Controllers\user\AllUserController;
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

    route::prefix('coupan/')->group(function(){
       route::get('/view',[CoupanController::class,'index'])->name('coupan.view');
       route::get('/add',[CoupanController::class,'addshow'])->name('coupan.add');
       route::post('/store',[CoupanController::class,'store'])->name('coupan.store');

       route::get('/edit/{id}',[CoupanController::class,'edit'])->name('coupan.edit');
      route::post('/update/{id}',[CoupanController::class,'update'])->name('coupan.update');
      route::get('/delete/{id}',[CoupanController::class,'delete'])->name('coupan.delete');

    });

    route::prefix('shiping/')->group(function(){
       route::get('/view',[ShipingController::class,'index'])->name('shiping.view');
       route::get('/add',[ShipingController::class,'addshow'])->name('shiping.add');
       route::post('/store',[ShipingController::class,'store'])->name('shiping.store');

       route::get('/edit/{id}',[ShipingController::class,'edit'])->name('shiping.edit');
      route::post('/update/{id}',[ShipingController::class,'update'])->name('shiping.update');
      route::get('/delete/{id}',[ShipingController::class,'delete'])->name('shiping.delete');

      //district route

      route::get('/distric_view',[ShipingController::class,'distric_view'])->name('distric.view');
       route::get('/distric_add',[ShipingController::class,'distric_addshow'])->name('distric.add');
       route::post('/distric_store',[ShipingController::class,'distric_store'])->name('distric.store');

       route::get('/distric_edit/{id}',[ShipingController::class,'distric_edit'])->name('distric.edit');
      route::post('/update/{id}',[ShipingController::class,'distric_update'])->name('distric.update');
      route::get('/distric_delete/{id}',[ShipingController::class,'distric_delete'])->name('distric.delete');

      // State All Route

      route::get('/state_view',[ShipingController::class,'state_view'])->name('state.view');
       route::get('/state_add',[ShipingController::class,'state_add'])->name('state.add');
       route::post('/state_store',[ShipingController::class,'state_store'])->name('state.store');

       route::get('/state_edit/{id}',[ShipingController::class,'state_edit'])->name('state.edit');
      route::post('/update/{id}',[ShipingController::class,'state_update'])->name('state.update');
      route::get('/state_delete/{id}',[ShipingController::class,'state_delete'])->name('state.delete');

      

    });

    route::prefix('order/')->group(function(){
        
      route::get('pendding-orders',[OrderController::class,'penddingOrder'])->name('pendding.order');

      route::get('pendding-details/{id}',[OrderController::class,'penddingOrderDetails'])->name('pendding.details');

      route::get('confirm-orders',[OrderController::class,'confirmOrder'])->name('confirm.order');

      route::get('proccessing-orders',[OrderController::class,'proccessingOrder'])->name('proccessing.order');
      
      route::get('picked-orders',[OrderController::class,'pickedOrder'])->name('picked.order');

      route::get('shipped-orders',[OrderController::class,'shippedOrder'])->name('shipped.order');

      route::get('delivered-orders',[OrderController::class,'deliveredOrder'])->name('delivered.order');

      route::get('cancel-orders',[OrderController::class,'cancelOrder'])->name('cancel.order');

      route::get('confirm-orders/{id}',[OrderController::class,'penddingToconfirm'])->name('pendding.confirm');

      route::get('confirm-Proccessing/{id}',[OrderController::class,'confirmToproccessing'])->name('confirm.Proccessing');

      route::get('proccessing-picked/{id}',[OrderController::class,'proccessingTopicked'])->name('proccessing.picked');

      route::get('picked-shipped/{id}',[OrderController::class,'pickedToshipped'])->name('picked.shipped');

      route::get('shipped-delivered/{id}',[OrderController::class,'shippedTodelivered'])->name('shipped.delivered');

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
route::post('/stripe/order',[StripeController::class,'stripeOrder'])->name('stripe.order');
route::get('/my/order',[AllUserController::class,'MyOrder'])->name('my.orders');
route::get('/order-details/{id}',[AllUserController::class,'OrderDetails']);
route::get('/invoice-download/{id}',[AllUserController::class,'invoiceDownload']);

route::post('return-order/{id}',[AllUserController::class,'returnOrder'])->name('return.order');

route::get('return-order-list',[AllUserController::class,'returnOrderList'])->name('retun.orders.list');

route::get('cancel-orders-list',[AllUserController::class,'returnOrderList'])->name('cancel.orders.list');

});

// cart all route here

route::get('/mycart',[CartPageController::class,'mycart'])->name('mycart');
route::get('/user/get-cart-product',[CartPageController::class,'getCartProduct']);
route::get('/user/cart/product-remove/{rowId}',[CartPageController::class,'cartRemove']);
route::get('/cart-increment/{rowId}',[CartPageController::class,'cartIncrement']);
route::get('/cart-decrement/{rowId}',[CartPageController::class,'cartDecrement']);

route::post('/coupan-aply',[CartController::class,'CoupanApply']);
route::get('/coupan-calculate',[CartController::class,'coupanCalculation']);
route::get('/coupan-remove',[CartController::class,'coupanRemove']);
//checkout route
route::get('/checkout',[CartController::class,'checkoutProcess'])->name('checkout');
//checkout Store
route::post('/checkout/store',[CheckoutController::class,'checkoutStore'])->name('checkout.store');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = user::find(Auth::user()->id);
        return view('dashboard',compact('user'));
    })->name('user.dashboard');
});

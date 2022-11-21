<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\front\IndexController;
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


//admin route
route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
route::get('admin/profile',[AdminController::class,'profile'])->name('admin.profile');
route::get('admin/edit-profile',[AdminController::class,'editProfile'])->name('admin.editProfile');
route::post('admin/updateprofile',[AdminController::class,'updateprofile'])->name('admin.update_profile');
route::get('admin/change_password',[AdminController::class,'change_password'])->name('admin.change_password');
route::post('admin/update_password',[AdminController::class,'update_password'])->name('admin.update_password');


});



// Front route
route::get('/',[IndexController::class,'index']);
route::get('user/logout',[IndexController::class,'destroy'])->name('user.logout');
route::get('user/profile',[IndexController::class,'profile'])->name('user.profile');
route::post('user/profile/store',[IndexController::class,'update_profile'])->name('user.profile.store');
route::get('user/change/password',[IndexController::class,'change_password'])->name('change.password');
route::post('user/update/password',[IndexController::class,'update_password'])->name('user.update.password');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = user::find(Auth::user()->id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});

<?php

use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Auth::user()->hasRole('Admin') ? redirect('admin/dashboard') : redirect('/');
        })->name('dashboard');
    });


//Customer Panel
Route::get('/', [FrontendDashboardController::class, 'index']);
Route::get('/product/{id}', [FrontendDashboardController::class, 'singleProduct'])->name('product');
Route::get('/shop/{id?}', [FrontendDashboardController::class, 'shop'])->name('shop');
Route::resource('cart', FrontendCartController::class);
Route::get('/addcart/{id}', [FrontendCartController::class, 'addCart'])->name('addcart');
Route::get('/contactus', [FrontendDashboardController::class, 'contact'])->name('contactus');
Route::resource('/contact', FrontendContactController::class);
Route::resource('/order', FrontendOrderController::class);
Route::get('/myorder', [FrontendUserController::class, 'myorder'])->name('myorder');


// Admin Panel
Route::group(['middleware' => ['role:Admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('dashboard', 'dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('order', OrderController::class);

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionsController::class);
});

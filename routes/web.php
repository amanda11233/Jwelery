<?php

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

Route::get('/', 'Controller@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/userlogout','Auth\LoginController@user_logout')->name('user.logout');
Route::prefix('admin')->group(function(){
    Route::get('/','Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/login','Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/adminlogout', 'Admin\AdminLoginController@logout')->name('admin.logout');

    Route::get('/users','Admin\AdminController@users')->name('admin.users');
    Route::get('/products','Admin\AdminController@products')->name('admin.products');
    Route::get('/categories','Admin\AdminController@categories')->name('admin.categories');
    Route::get('/offers','Admin\AdminController@offers')->name('admin.offers');
    Route::resource('/careers','careers\careersController');
    
    Route::post('/editProduct', 'Products\ProductsController@editProduct')->name('product.editProduct');
    Route::resource('/category','Categories\CategoriesController');
    Route::resource('/product','Products\ProductsController');
    Route::resource('/offer','Offer\OfferController');
    
    //Password Reset Routes
    Route::post('/password/email','Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset' , 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}','Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::resource('/cart','CartController');
Route::get('/cartDelete/{id}' ,'CartController@deleteItem')->name('cart.delete');
Route::get('/addToCart/{id}', 'CartController@addToCart')->name('cart.addToCart');

Route::get('/checkout','Payment\PaymentController@showCheckoutForm')->name('checkout');
Route::get('/payment','Payment\PaymentController@postCheckout')->name('checkout.submit');

Route::get('/career','Controller@career')->name('career');
Route::post('/career','Controller@sendMail')->name('career.mail');
Route::post('/search', 'Controller@browse')->name('browse');
Route::get('/jwelery','Products\ProductsController@index')->name('jwelery.index');
Route::get('/jwelery/{id}','Products\ProductsController@viewProduct')->name('jwelery.view');
Route::get('/category/{categoryName}','Categories\CategoriesController@show')->name('category.show');
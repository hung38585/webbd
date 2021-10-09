<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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
// Client controller
Route::group(array('namespace'=>'Client'),function(){
    // Change language
    Route::group(['middleware' => 'App\Http\Middleware\LangMiddleware'], function() {
        Route::get('change-language/{language}', 'LangController@changeLanguage')->name('user.change-language');
    });
    Route::resource('san-pham', 'ProductController');
    Route::get('/', 'HomeController@index');
    // Route::get('/phan-hoi', 'HomeController@feedback');
    Route::get('/lien-he', 'HomeController@contact');
    Route::get('/ve-chung-toi', 'HomeController@about');
    Route::get('/tin-tuc', 'HomeController@new');
    Route::get('/tin-tuc/{title}', 'HomeController@newDetail');
    Route::get('/cam-nang', 'HomeController@share');
    Route::get('/cam-nang/{title}', 'HomeController@shareDetail');
    // Shopping Cart
    Route::resource('gio-hang', 'CartController');
    Route::post('mua-hang', 'CartController@checkout');
    Route::post('dat-hang', 'CartController@order')->name('dat-hang');
}); 
Route::group(['middleware' => ['checklogin']], function () {
    // Admin controller
    Route::group(array('prefix'=>'admin', 'namespace'=>'Admin'),function(){
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
        Route::resource('image', 'ImageController');
        // Route::resource('feedback', 'FeedbackController');
        Route::resource('infomation', 'InfomationController');
        // Route::resource('service', 'ServiceController');
        Route::resource('about', 'AboutController');
        Route::resource('order', 'OrderController');
        // Edit list image product
        Route::get('/list-image/{id}', 'ProductController@listImage');
        Route::get('/change-password', 'AuthController@changePassword')->name('changepassword');
        Route::post('/change-password', 'AuthController@updatePassword')->name('admin.changepassword');
        Route::resource('new', 'NewController');
        Route::resource('share', 'ShareController');
    }); 
    
    // Route::resource('photo', PhotoController::class);
});
// Auth
Route::get('/admin/login', 'Admin\AuthController@index')->name('login');
Route::post('/admin/admin-login', 'Admin\AuthController@login')->name('admin.login');
// Route::get('/admin/register', 'Admin\AuthController@create')->name('register');
// Route::post('/admin/admin-registerr', 'Admin\AuthController@store')->name('admin.register');
Route::get('/admin/logout', 'Admin\AuthController@logout')->name('logout');

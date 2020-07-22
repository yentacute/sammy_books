<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/','HomeController@index')->name('frontend.home');
    Route::get('admin/AddProduct','PostProductController@create')->name('admin.AddProduct');
    Route::post('admin/AddProduct','PostProductController@store')->name('admin.AddProduct');
    Route::get('/Product/delete/{id}','PostProductController@destroy')->name('admin.product.delete');
    Route::get('/admin/ListProduct','PostProductController@index')->name('admin.ListProduct');
// Route::match(['get', 'post'], '/admin/AddProduct','ListProductController@AddProduct')->name('admin.AddProduct');
Route::get('/product/edit/{id}','PostProductController@edit')->name('product.edit')->middleware('admin');
Route::post('/product/update','PostProductController@update')->name('product.update')->middleware('admin');
Route::get('/category/list','CategoryController@index')->name('category.list');
Route::get('/category/add','CategoryController@create')->name('category.show')->middleware('admin');
Route::post('/category/add','CategoryController@store')->name('category.add')->middleware('admin');
Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete')->middleware('admin');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('cate.edit')->middleware('admin');
Route::post('/category/update', 'CategoryController@update')->name('cate.update')->middleware('admin');
Route::get('/slide/list', 'SlideController@index')->name('slide.list')->middleware('admin');
Route::get('/slide/add', 'SlideController@create')->name('slide.create')->middleware('admin');
Route::post('/slide/add', 'SlideController@store')->name('slide.add')->middleware('admin');
Route::get('/slide/delete/{id}', 'SlideController@destroy')->name('slide.delete')->middleware('admin');
Route::get('/slide/edit/{id}', 'SlideController@edit')->name('slide.edit')->middleware('admin');
Route::post('/slide/update', 'SlideController@update')->name('slide.update')->middleware('admin');
Route::get('/user/signup', 'UserController@create')->name('user.create');
Route::post('/user/signup', 'UserController@store')->name('user.update');
Route::get('/books/category/{id}', 'HomeController@cate')->name('books.cate');
Route::get('/books/detail/{id}', 'HomeController@detail')->name('books.detail');
Route::get('/books/product', 'HomeController@Product')->name('books.product');
Route::get('/search', 'HomeController@Search')->name('books.search');
//đăng nhập
Route::get('user/login','UserController@loginlayout')->name('user.login');
Route::post('user/login','UserController@logincheck')->name('user.post');
Route::get('/logout','UserController@logout')->name('auth.logout');
//product gallery
Route::get('product/gallery/list','ProductGalleryController@index')->name('gallery.list');
Route::get('gallery/add','ProductGalleryController@create')->name('gallery.create');
Route::post('product/gallery','ProductGalleryController@store')->name('gallery.store');
Route::get('gallery/delete/{id}','ProductGalleryController@destroy')->name('gallery.delete');
//user
Route::get('user/list','UserController@index')->name('user.list');
//publisher
Route::get('/books/publisher/{id}', 'HomeController@publisher')->name('books.publisher');
Route::get('publisher/list','PublisherController@index')->name('publisher.list')->middleware('admin');
Route::get('publisher/add','PublisherController@create')->name('publisher.add')->middleware('admin');
Route::post('publisher/add','PublisherController@store')->name('publisher.post')->middleware('admin');
Route::get('publisher/delete/{id}','PublisherController@destroy')->name('publisher.delete')->middleware('admin');
//cart
Route::get('/cart','HomeController@showCart')->name('cart.showCart');
Route::get('/add-to-cart/{id}','HomeController@getAddToCart')->name('cart.add');
Route::patch('/update-cart','HomeController@updateCart')->name('cart.update');
Route::get('remove-from-cart', 'HomeController@removeCart')->name('cart.remove');
//CHECK OUT
Route::get('/checkout','CheckOutController@index')->name('product.checkout');
Route::match(['get', 'post'], '/checkout/send','CheckOutController@store')->name('checkout.post');
Route::get('/checkout/delete/{id}','CheckOutController@destroy')->name('checkout.delete');
Route::get('admin/checkout','CheckOutController@AdminCheckOut')->name('admin.checkout')->middleware('admin');


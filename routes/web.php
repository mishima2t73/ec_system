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
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
/*//決済ボタン表示ページ
Route::get('/','settlementController@index')->name('index');
//Stripeの処理
Route::get('/settlement','settlementController@settlement')->name('settlement');
//決済完了ページ
Route::get('/complete','settlementController@complete')->name('complete');
*/
Route::get('/home', 'ProductController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
 

//商品登録表示
Route::get('/product/product_add','ProductController@product_addshow')->name('product.product_add');
//商品登録
Route::post('/product/product_store','ProductController@exe_store')->name('product.product_store');


//商品一覧
Route::get('/product/product_list','ProductController@product_list')->name('product.product_list');

//
//Route::get()

//商品詳細
Route::get('/product/{id}','ProductController@product_data')->name('product.product_data');

//商品更新ページ表示
Route::get('/product/update/{id}','ProductController@product_updateshow')->name('product_updateshow');

//商品情報更新
Route::post('/product/update','ProductController@product_update')->name('product_update');


//商品削除
Route::post('/product/delete/{id}','ProductController@product_delete')->name('product_delete');
//  return redirect('/product/product_list');
  
/*
|-------------------------------------------------------------------------
| 管理者以上で操作
|-------------------------------------------------------------------------
*/
//Route::group(['middleware' => ['auth', 'can:admin']], function () {
  Route::group(['middleware' => ['auth']], function () {
  //ユーザー登録
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');
});

//スタッフ一覧
Route::get('staff/staff_list','StaffsController@staff_list')->name('staff_list');
//配送設定一覧
Route::get('delivery/setting','AdminContoroller@show_setting')->name('setting');

//test
Route::get('/test', 'ProductController@wptest')->name('wptest');

//消費者向けショップ画面----------------------------------
//top
Route::get('/top','ShopController@topview')->name('top');

//商品詳細
Route::get('shop/product/{id}','ShopController@showproduct_data')->name('showproduct_data');
 
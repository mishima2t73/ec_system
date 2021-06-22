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

//Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
//ユーザーログイン
Route::namespace('User')->prefix('user')->name('user.')->group(function(){
  //認証
  Auth::routes([
    'register'=>true,
    'reset'=>false,
    'verify'=>false
  ]);
  //認証後
  Route::middleware('auth:user')->group(function(){
    //TOP
    Route::resource('home','HomeController',['only'=>'index']);
  });
});
//管理者ログイン
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
  //認証
  Auth::routes([
    'register'=>true,
    'reset'=>false,
    'verify'=>false
  ]);
  //認証後
  Route::middleware('auth:admin')->group(function(){
    //TOP
    Route::resource('home','HomeController',['only'=>'index']);
  });
});

Route::get('/', function () {
    return view('welcome');
});

//商品登録表示
Route::get('/admin/product/product_add','ProductController@product_addshow')->name('product.product_add');
//商品登録
Route::post('/admin/product/product_store','ProductController@exe_store')->name('product.product_store');


//商品一覧
Route::get('/admin/product/product_list','ProductController@product_list')->name('product.product_list');

//
//Route::get()

//商品詳細
Route::get('/admin/product/{id}','ProductController@product_data')->name('product.product_data');

//商品更新ページ表示
Route::get('/admin/product/update/{id}','ProductController@product_updateshow')->name('product_updateshow');

//商品情報更新
Route::post('/admin/product/update','ProductController@product_update')->name('product_update');


//商品削除
Route::post('/admin/product/delete/{id}','ProductController@product_delete')->name('product_delete');
//  return redirect('/product/product_list');
  
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
//カート
Route::post('shop/cartin','ShopController@shop_cartin')->name('shop_cartin');
//カート表示
Route::get('shop/cart','ShopController@shop_cartshow')->name('show_cart');

 
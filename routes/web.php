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
    'verify'=>true
  ]);
  //認証後
  Route::middleware('auth:user')->group(function(){
    //TOP
    Route::resource('home','HomeController',['only'=>'index']);
  });
  //reset
  
});
  Route::post('password/email', 'User\Auth\ForgotPasswordController@sendResetLinkEmail')->name('User.password.email');
  Route::get('password/reset', 'User\Auth\ForgotPasswordController@showLinkRequestForm')->name('User.password.request');
  Route::post('password/reset', 'User\Auth\ResetPasswordController@reset')->name('User.password.update');
  Route::get('password/reset/{token}', 'User\Auth\ResetPasswordController@showResetForm')->name('User.password.reset');

//管理者ログイン
//Route::get('/admin/staff/staff_add','RegisterController@showRegistrationForm')->name('staff_registshow');

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
  Route::post('admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('Admin.password.email');
  Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('Admin.password.request');
  Route::post('admin/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('Admin.password.update');
  Route::get('admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('Admin.password.reset');
  Route::middleware('user:verified')->group(function(){

  return view('/user/verify');
});

Route::get('/', function () {
    return view('welcome');
});

//商品登録表示
Route::get('/admin/product/product_add','ProductController@product_addshow')->name('product.product_add');
//商品登録
Route::post('/admin/product/product_store','ProductController@exe_store')->name('product.product_store');


//商品一覧、カテゴリー絞り込み、並び替え
Route::get('/admin/product/product_list','ProductController@product_list')->name('product.product_list');

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
Route::get('/admin/staff/staff_list','StaffsController@staff_list')->name('staff_list');

//配送設定一覧
//Route::get('delivery/setting','AdminContoroller@show_setting')->name('setting');

//test
Route::get('/test', 'ProductController@wptest')->name('wptest');

//売上一覧
Route::get('admin/salse','Admin\HomeController@sales_show')->name('sales_show');

Route::get('admin/salse_analysis','Admin\HomeController@sales_analysis')->name('sales_analysis');
//明細
Route::get('admin/sales/{sales_number}','Admin\HomeController@product_sale_detail')->name('showproduct_data');

//test購入ページ表示
Route::get('/test_buy','Admin\HomeController@test_buypage')->name('testbuypage');


//消費者向けショップ画面----------------------------------
//top
Route::get('/top','ShopController@topview')->name('top');
//カテゴリー絞り込み
//Route::get('/category','ShopController@shop_category')->name('shop_calegory');
//商品詳細
Route::get('shop/product/{id}','ShopController@showproduct_data')->name('showproduct_data');
//カート
Route::post('shop/cartin','ShopController@shop_cartin')->name('shop_cartin');
//カート表示
Route::get('shop/cart','ShopController@shop_cartshow')->name('show_cart');
//お問い合わせ
Route::get('shop/contact/', 'ContactController@input')->name('shop_contact'); // 入力画面
Route::patch('shop/contact/', 'ContactController@confirm')->name('shop_confirm'); // 確認画面
Route::post('shop/contact/', 'ContactController@finish'); // 完了画面
//検索表示
Route::get('shop/kensaku','KensakuController@kensaku_index')->name('kensaku_index');



//管理者用登録ルート
Route::group(['middleware' => ['auth:admin', 'can:admin']], function () {
  //ユーザー登録
  Route::get('/admin/staff/staff_add','Admin\Auth\RegisterController@showRegistrationForm')->name('staff_registshow');
  //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::get('/admin/staff/staff_add','Admin\Auth\RegisterController@create')->name('staff_regist');
});
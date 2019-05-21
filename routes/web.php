<?php
ini_set("display_errors", "On");
error_reporting(E_ALL & ~E_NOTICE);
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

Route::get('/',['as' => 'restaurant.index' , 'uses' => 'HomeController@index']);

//Route::get('restaurant/{id}' ,['as' => 'restaurant{id}.staffs' , 'uses' => 'HomeController@staff']);

//Route::get('restaurant/{id}/staff' ,['as' => 'restaurant.staffs.chose' , 'uses' => 'HomeController@chose']);

Route::get('login/{id}' ,['as' => 'restaurant{id}.staffs.login' , 'uses' => 'StaffController@login']);

/*登出及登入*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

/*餐廳後台*/
Route::group(['prefix' => 'backstage'], function() {
    Route::get('/home'                   , 'StaffController@login2')->name('backstage.manager.index');

    /*基本資料*/
    Route::get('/information'           , 'RestaurantController@index')->name('backstage.manager.information.index');
    Route::get('/information/{id}/edit' , 'RestaurantController@edit')->name('backstage.manager.information.edit');
    Route::patch('/information/{id}'    , 'RestaurantController@update')->name('backstage.manager.information.update');

    /*經理-post*/
    Route::get('/post'           , 'PostController@index')->name('backstage.manager.post.index');
    Route::get('/post/create'    , 'PostController@create')->name('backstage.manager.post.create');
    Route::get('/post/{id}/edit' , 'PostController@edit')->name('backstage.manager.post.edit');
    Route::patch('/post/{id}'    , 'PostController@update')->name('backstage.manager.post.update');
    Route::post('/post'          , 'PostController@store')->name('backstage.manager.post.store');
    Route::delete('/post/{id}'   , 'PostController@destroy')->name('backstage.manager.post.destroy');

    /*經理-staff*/
    Route::get('/staff'           , 'StaffController@index')->name('backstage.manager.staff.index');
    Route::get('/staff/create'    , 'StaffController@create')->name('backstage.manager.staff.create');
    Route::get('/staff/{id}/edit' , 'StaffController@edit')->name('backstage.manager.staff.edit');
    Route::patch('/staff/{id}'    , 'StaffController@update')->name('backstage.manager.staff.update');
    Route::post('/staff'          , 'StaffController@store')->name('backstage.manager.staff.store');
    Route::delete('/staff/{id}'   , 'StaffController@destroy')->name('backstage.manager.staff.destroy');

    /*經理-coupon*/
    Route::get('/coupon'          , 'CouponController@index')->name('backstage.manager.coupon.index');
    Route::get('/coupon/create'   , 'CouponController@create')->name('backstage.manager.coupon.create');
    Route::get('/coupon/{id}/edit', 'CouponController@edit')->name('backstage.manager.coupon.edit');
    Route::patch('/coupon/{id}'   , 'CouponController@update')->name('backstage.manager.coupon.update');
    Route::post('/coupon'         , 'CouponController@store')->name('backstage.manager.coupon.store');
    Route::delete('/coupon/{id}'  , 'CouponController@destroy')->name('backstage.manager.coupon.destroy');

    /*經理-coupon發送通知*/
    Route::get('/{id}/coupon-noti'          , 'CouponController@noti')->name('backstage.manager.coupon.noti');

    /*經理-table*/
    Route::get('/table'           , 'TableController@index_2')->name('backstage.manager.table.index');
    Route::get('/table/create'    , 'TableController@create')->name('backstage.manager.table.create');
    Route::get('/table/{id}/edit' , 'TableController@edit')->name('backstage.manager.table.edit');
    Route::patch('/table/{id}'    , 'TableController@update')->name('backstage.manager.table.update');
    Route::post('/table'          , 'TableController@store')->name('backstage.manager.table.store');
    Route::delete('/table/{id}'   , 'TableController@destroy')->name('backstage.manager.table.destroy');

    /*經理-餐廳token修改*/
    Route::get('token',['as'=>'backstage.manager.token.index','uses'=>'RestaurantController@tokenindex']);
    Route::get('token/{id}/edit',['as'=>'backstage.manager.token.edit','uses'=>'RestaurantController@tokenedit']);
    Route::patch('token/{id}',['as'=>'backstage.manager.token.update','uses'=>'RestaurantController@tokenupdate']);

/*-------------------------------------------------------------------------------------------------------------------------------*/

    /*主廚-家*/
    Route::get('chef/home'          , ['as' => 'backstage.chef.home'  , 'uses' => 'KitchenController@index']);

    /*主廚-餐點管理*/
    Route::get('meal'          , ['as' => 'backstage.chef.meal.index'  , 'uses' => 'MealController@index']);
    Route::get('meal/create'   , ['as' => 'backstage.chef.meal.create' , 'uses' => 'MealController@create']);
    Route::get('meal/{id}/edit', ['as' => 'backstage.chef.meal.edit'   , 'uses' => 'MealController@edit']);
    Route::patch('meal/{id}'   , ['as' => 'backstage.chef.meal.update' , 'uses' => 'MealController@update']);
    Route::post('meal'         , ['as' => 'backstage.chef.meal.store'  , 'uses' => 'MealController@store']);
    Route::delete('meal/{id}'  , ['as' => 'backstage.chef.meal.destroy', 'uses' => 'MealController@destroy']);

    /*主廚-出餐管理*/
    Route::get('rcveod' , ['as' => 'backstage.chef.order.index' , 'uses' => 'OrderController@index']);
    Route::get('rcveod/{id}' , ['as' => 'backstage.chef.detail.index' , 'uses' => 'ItemController@index']);
    Route::patch('rcveod/{id}/{item_id}' , ['as' => 'backstage.chef.detail.update' , 'uses' => 'ItemController@update']);

    /*主廚-出餐完成通知*/
    Route::get('rcveod/{id}/{item_id}/noti' , ['as' => 'backstage.chef.detail.noti' , 'uses' => 'ItemController@noti']);

    /*firebase測試*/
    Route::get('firejava',['as'=>'backstage.chef.fire3','uses'=>'KitchenController@fire']);//firebase搭配javascript-fetch指令
    Route::get('firelara',['as'=>'backstage.chef.noti','uses'=>'KitchenController@noti']);//firebase搭配laravel-fcm套件的按鈕


/*-------------------------------------------------------------------------------------------------------------------------------*/

    /*櫃台index*/
    Route::get('/counter/index', ['as' => 'counter.login.index' , 'uses' => 'CounterController@index']);
    Route::get('/counter/history/index', ['as' => 'counter.history.index' , 'uses' => 'CounterController@HistoryIndex']);
    Route::get('/counter/dining/index', ['as' => 'counter.dining.index' , 'uses' => 'CounterController@DiningIndex']);
    Route::get('/counter/booking/index', ['as' => 'counter.booking.index' , 'uses' => 'CounterController@BookingIndex']);
    Route::get('/counter/checking/index', ['as' => 'counter.checking.index' , 'uses' => 'CounterController@CheckingIndex']);
    Route::get('/counter/checking/{id}/item', ['as' => 'counter.checking.item' , 'uses' => 'CounterController@CheckingItem']);
    Route::patch('/counter/checking/{id}/item/{item_id}', ['as' => 'counter.checking.kitchen' , 'uses' => 'CounterController@CheckingKitchen']);//發送餐點至廚房、給通知

    /*櫃台booking細部*/
    Route::get('/restaurant/seat/update', ['as' => 'restaurant.seat.update' , 'uses' => 'TableController@update']);
    Route::get('/restaurant/{restaurant}/table', ['as' => 'restaurant.table.index' , 'uses' => 'TableController@index']);
    Route::get('/restaurant/{restaurant}/table/check',['as'=>'restaurant.table.check','uses'=>'TableController@check']);
    Route::get('/restaurant/{restaurant}/people/check',['as'=>'restaurant.people.check','uses'=>'TableController@PeopleCheck']);
    Route::get('/restaurant/{restaurant}/member/check',['as'=>'restaurant.member.check','uses'=>'TableController@MemberCheck']);
    Route::patch('/restaurant/{restaurant}/customer/check',['as'=>'restaurant.customer.check','uses'=>'TableController@CustomerCheck']);
    Route::get('/restaurant/{restaurant}/member/check/store',['as'=>'restaurant.member.store','uses'=>'MemberCheckController@store']);

});











//測試
Route::get('555', function () {
    return view('/test');
});

//seat
Route::get('666',function () {
    return view('/backstage/manager/seat/seat');
});

//掃描QR頁面
Route::get('scanning', function () {
    return view('/scanning');
});
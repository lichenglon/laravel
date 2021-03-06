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
//前台



//后台首页
Route::get('/', 'HomeController@index')->name('/');
//上传
Route::any('home/upload_image', 'HomeController@upload_image');
//登录
Route::any('users/login','UsersController@login')->name('users/login');
Route::any('users/logout','UsersController@logout')->name('users/logout');



//账号管理
Route::group(['prefix'=>'account'],function(){
    //账号
    Route::resource('user','Account\AccountController');
    Route::post('user', 'Account\AccountController@index');
    Route::post('user/store', 'Account\AccountController@store');
    Route::get('user/updateStatus/{id}/{status}','Account\AccountController@updateStatus');
    //数据备份
    Route::get('database','Account\DatabaseController@index');

    //角色
    Route::resource('role', 'Account\RoleController');
    Route::post('role/store', 'Account\RoleController@store');
    Route::get('role/updateStatus/{id}/{status}','Account\RoleController@updateStatus');


});

//分类管理
Route::group(['prefix'=>'category'],function(){
    //栏目
    Route::any('menu','Category\MenuController@index')->name('column/menu/index');
    Route::any('tree_menu','Category\MenuController@tree');
    Route::any('menu/updateStatus','Category\MenuController@updateStatus');
    Route::any('menu/create/{pid?}','Category\MenuController@create')->name('column/menu/create');
    Route::any('menu/store','Category\MenuController@store')->name('column/menu/store');
    Route::any('menu/edit','Category\MenuController@edit');
    Route::any('menu/destroy/{id}','Category\MenuController@destroy');

});

//订单中心
Route::group(['prefix'=>'order'],function(){

    Route::any('order', 'Order\OrderController@index')->name('order/order');
    Route::any('order/store', 'Order\OrderController@store');
    Route::any('order/exportOrderData', 'Order\OrderController@exportOrderData');
    Route::any('order/ship/{id}', 'Order\OrderController@ship');
    Route::any('order/detail/{id}','Order\OrderController@detail');
    #订单详情Excel导出
    Route::any('order/detail_excel/{id}','Order\OrderController@detail_excel');
    #订单列表Excel导出
    Route::any('order/order_excel','Order\OrderController@order_excel');
    //审核状态更改，暂时不用
    Route::get('order/isCheck', 'Order\OrderController@isCheck');
    //售后
    Route::any('order/after_sale/{id}', 'Order\OrderController@afterSale');
    //审核订单
    Route::any('order/check/{id}','Order\OrderController@check');
    //审核保存
    Route::any('order/saveChk','Order\OrderController@saveChk');


//    Route::resource('order', 'Order\OrderController');
    Route::any('after_sale', 'Order\AfterSaleController@index');
    Route::any('ship', 'Order\ShipController@index');

});


//结算管理
Route::group(['prefix'=>'balance'],function(){

   /* Route::get('export_file','exportFile');
    Route::any('import_file','importFile');*/

});



//房源管理
Route::group(['prefix'=>'house'],function() {
    $controller = 'House\HouseController@';
    $typeController = 'House\TypeController@';
    #房源添加表单
    Route::get('houseAdd',$controller.'houseAdd');
    #房源添加表单提交
    Route::post('houseAdd/save',$controller.'save');

    #修改房源界面
    Route::get('houseLister/update/{id}',$controller.'update');
    #房源信息修改表单提交
    Route::post('houseLister/uSave',$controller.'uSave');

    #Ajax请求删除图片
    Route::get('houseLister/del',$controller.'del');
    #Ajax请求获取省份市区
    Route::get('houseLister/region',$controller.'region');
    #房源详细信息
    Route::get('houseLister/detail/{id}',$controller.'houseDetail');
    #房源类型
    Route::get('type',$typeController.'index');
    #房源类型添加
    Route::get('type/add',$typeController.'add');
    #房源类型添加表单提交
    Route::post('type/add/save',$typeController.'save');
    #房源分类部分
    Route::any('type/tree',$typeController.'tree');
    #删除类型
    Route::any('type/delete/{id}',$typeController.'delete');
    #修改类型
    Route::any('type/update',$typeController.'update');
    #房源检索/导出Excel/列表
    Route::get('houseLister',$controller.'houseLister');
    #地图
    Route::get('houseLister/houseMap',$controller.'houseMap');

    #房源审核
    Route::any('houseCheck',$controller.'houseCheck');
    #修改审核状态
    Route::get('houseCheck/isCheck',$controller.'isCheck');
    #审核日志
    Route::any('operateLog',$controller.'operateLog');
});
//国家地区城市添加
Route::group(['prefix'=>'nation'],function() {
    $controller = 'Nation\NationController@';
    #国家城市地区
    Route::get('add',$controller.'add');
    #国家添加
    Route::post('add/state',$controller.'state');
    #省份添加
    Route::post('add/province',$controller.'province');
    #市区添加
    Route::post('add/city',$controller.'city');
});

//数据报表
Route::group(['prefix'=>'data_statement'],function() {
    $controller = 'Data_statement\DataController@';
    #柱形图
    Route::get('column',$controller.'column');
    #折线图
    Route::get('line',$controller.'line');
});

//帮助手册
Route::group(['prefix'=>'helpHandbook'],function() {
    $controller = 'helpHandbook\ManualController@';
    #用户添加帮助手册
    Route::get('help',$controller.'help');
});

//用户反馈
Route::any('user/feedback','User\FeedbackController@feedback');
//用户评论
Route::any('user/comment','User\FeedbackController@comment');
//用户评论删除
Route::any('user/comment/delete/{id?}','User\FeedbackController@delete');






















<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('/', function () {
    // return view('welcome');
 });
 

//Route::resource('/','Home\IndexController');
// 验证码的路由
Route::get('/code','CodeController@code');
/**
 * 管理员后台
 */



//登录
Route::resource('/admin/login','Admin\LoginController');


Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){
    //后台首页
    Route::resource('index','IndexController');
    // 商品管理
    Route::resource('goods','GoodsController');
    //普通用户管理
    Route::resource('user','UserController');
    //修改密码
    Route::resource('update','UpdateController');
    //商品分类
    Route::resource('goodsclass','GoodsClassController');
    //商品推荐
    Route::resource('goodsrecommend','GoodsRecommendController');
    // 商品推荐
    Route::resource('advert','AdvertController');
    // 广告位列表
    Route::resource('adsense','AdsenseController');
    //商家信息
    Route::resource('seller','SellerController');
    //订单
    Route::resource('order','OrderController');
    //维修/查看
    Route::resource('service','ServiceController');
    //评价
    Route::resource('eval','EvalController');
    //收藏
    Route::resource('collection','CollectionController');
    //审核
    Route::resource('examine','ExamineController');
    //常见问题
    Route::resource('Problem','ProblemController');
    //后台管理员用户
    Route::resource('admin','AdminController');
    //友情链接
    Route::resource('links','LinksController');
    //网站配置
    Route::resource('config','ConfigController');
    //修改网站配置排序
    Route::any('config/changeorder','ConfigController@changeOrder');
    //网站配置内容修改路由
    Route::any('config/changecontent','ConfigController@changeContent');

});

/**
 * 商家后台
 */

    //登录
    Route::resource('/seller/login','Seller\LoginController');
    //忘记密码
    Route::any('/seller/forget','Seller\ForgetController@index');
    //发送邮件
    Route::any('/seller/email','Seller\ForgetController@email');

    //重置密码界面
    Route::any('/seller/reset','Seller\ForgetController@sreset');
    //密码重置逻辑路由
    Route::any('/seller/dosreset','Seller\ForgetController@dosreset');
    //注册
    Route::resource('seller/register','Seller\RegisterController');
    // 获取手机号
    Route::any('seller/phone','Seller\RegisterController@phone');
    //给用户发送短信
    Route::any('seller/phoneto','Seller\RegisterController@phoneto');
    //判断昵称是否重复
    Route::any('seller/stel','Seller\RegisterController@stel');
    //判断邮箱是否重复
    Route::any('email','RegisterController@email');

    Route::group(['prefix'=>'seller','namespace'=>'Seller'], function(){

        //退出登录
        Route::any('quit','LoginController@quit');
        //商家账号设置
        Route::resource('setup','SetupController');
        //商家个人中心
        Route::resource('personal','PersonalController');
        //商家个人中心修改
        Route::any('updateper','PersonalController@updateper');
        //商家个人中心修改 修改个人头像
        Route::any('face','PersonalController@updateface');
        //商家个人中心修改 修改密码
        Route::any('pwd','PersonalController@pwd');
        //商家个人提醒 来新订单提醒
        Route::any('warn','WarnController@warn');

        //商家我要开店
        Route::resource('kaidian','KaidianController');
        //商家我要开店失败后
        Route::any('xiugaikaidian','KaidianController@xiugai');
        //验证表单 修改商铺名称时 判断 除去自己是否有重名
        Route::any('updatexnameajax','KaidianController@updatexnameajax');

        //商户设置验证表单-商户名
        Route::any('exnameajax','SetupController@exnameajax');
        //商户设置验证表单-门店地址图片
        Route::any('eximageajax','SetupController@eximageajax');
        //商户设置验证表单-商户logo
        Route::any('setupajax','SetupController@setupajax');
        //商家用户个人中心 首页
        Route::resource('index','IndexController');
        //菜品分类管理
        Route::resource('goodsclass','GoodsClassController');
        //验证表单 修改菜名是判断 除去自己是否有重名
        Route::any('gnameajax','GoodsController@gnameajax');
        //菜品管理
        Route::resource('goods','GoodsController');
        //验证上传图片
        Route::any('upload','GoodsController@upload');
        //验证商品修改
        Route::any('updateajax','GoodsController@updateajax');
        //ajax 改变商品的状态 在售->售罄
        Route::any('zaishou','GoodsController@zaishou');
        //订单管理
        Route::resource('order','OrderController');
        //评价
        Route::resource('eval','EvalController');
        // 广告
        Route::resource('advert','AdvertController');


    });



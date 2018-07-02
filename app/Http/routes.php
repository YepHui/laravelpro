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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('insertTest', 'TestController@insertTest');
Route::get('selectTest2', 'TestController@selectTest2');
Route::get('selectOne', 'TestController@selectOne');
Route::get('testTrank', 'TestController@testTrank');
//基础路由
Route::get('basic1',function (){
    return "hello world";
});
Route::post('basic2',function(){
    return 'Basic2';
});
//多请求路由
Route::match(['get','post'],'multy1',function(){
    return 'multy1';
});
Route::any('multy2',function(){
    return 'multy2';
});
//路由参数
/*Route::get('user/{id}',function($id){
    return 'User-id-'.$id;
});*/
/*Route::get('user/{name?}',function($name=null){
    return 'User-name-'.$name;
});*/

/*Route::get('user/{name?}',function($name='sean'){
    return 'User-name-'.$name;
});*/

/*Route::get('user/{name?}',function($name='sean'){
    return 'User-name-'.$name;
})->where('name','[A-Za-z]+');*/

/*Route::get('user/{id}/{name?}',function($id,$name='sean'){
    return 'User-id-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]','name'=>'[A-Za-z]+']);*/
//路由别名

/*Route::get('user/center',['as'=>'center',function(){
    return route('center');
}]);*/

//路由群组

Route::group(['prefix'=>'member'],function(){
    Route::get('user/center',['as'=>'center',function(){
        return route('center');
    }]);
    Route::any('multy2',function(){
        return 'member-multy2';
    });
});

//Route::get('member/info','MemberController@info');
/*Route::any('member/info',['uses'=>'MemberController@info']);*/
/*Route::any('member/info',[
    'uses'=>'MemberController@info',
    'as'=>'memberinfo'
]);*/

Route::any('member/{id}',['uses'=>'MemberController@info'])->where('id','[0-9]');
Route::any('query1',['uses'=>'MemberController@query1']);
Route::any('orm1',['uses'=>'TrankController@orm1']);
Route::any('orm2',['uses'=>'TrankController@orm2']);
Route::any('orm3',['uses'=>'TrankController@orm3']);
Route::any('orm4',['uses'=>'TrankController@orm4']);
Route::match(['get','post'],'/index','IndexController@index');


Route::any('wx', 'Wx\WxController@checkWx');
Route::any('testqueue','TestQueueController@index');
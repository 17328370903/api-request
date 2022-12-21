<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware( [ 'mysession' ] )->group( function () { //必须开启sessiion
         #登录
         Route::get( "/login", function () {
             return view( "index.login" );
         } )->name( 'login');
         Route::post( "/login", [
             \App\Http\Controllers\Home\loginController::class, 'login', ] );
         //退出登录
        Route::get('/outlogin',function(){
            Auth::logout();
            return redirect('login');
        });

         #注册
         Route::get( "/register", function () {
             return view( "index.register" );
         } );
         Route::post( "/register", [ \App\Http\Controllers\Home\RegisterController::class, 'register', ] );
         #发送邮件
         Route::post( "/register/sendEmail", [ \App\Http\Controllers\Home\RegisterController::class, 'sendEmail', ] );

         //授权登录后的路由
         Route::middleware( [ 'auth' ] )->group( function () {
              Route::get( '/', [\App\Http\Controllers\Home\IndexController::class,'index'] );
              //项目
             Route::get( "/project/add",function(){
                 return view('index.project.add');
             });
             Route::post('/project/add',[\App\Http\Controllers\Home\ProjectController::class,'create']);
             Route::get('project/info',[\App\Http\Controllers\Home\ProjectController::class,'info']);
             Route::get('project/edit',[\App\Http\Controllers\Home\ProjectController::class,'edit']);
             Route::post('project/update',[\App\Http\Controllers\Home\ProjectController::class,'update']);

             //api
             //添加目录
             Route::post('/api/addDir',[\App\Http\Controllers\Home\ApiController::class,'addDir']);
             //添加api
             Route::post('/api/addApi',[\App\Http\Controllers\Home\ApiController::class,'addApi']);
             //api 详情
             Route::get('/api/info',[\App\Http\Controllers\Home\ApiController::class,'info']);
             //修改api
             Route::post('/api/update',[\App\Http\Controllers\Home\ApiController::class,'update']);
             //请求
             Route::post( "/api/request",[\App\Http\Controllers\Home\ApiController::class,'request']);

         } );
     } );

Route::get( "/code",function(){

});



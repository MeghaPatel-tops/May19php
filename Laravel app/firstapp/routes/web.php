<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdcutController;

Route::get('/', function () {
    return "Hello rops tecch";
});

Route::get('/home',function(){
    return "Home Page";
});

Route::redirect('/tops','/careercenter');

Route::get('/careercenter',function(){
    return "Career Center";
});

Route::view('/test','test',['name'=>'Megha']);

Route::get('/product/{id}',function($id){
    echo $id;
});
Route::get('/test1',[TesController::class,'testMethod']);
Route::get('/single',PostController::class);

Route::resource('products',ProdcutController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('Home');
});

Route::get('/about', function () {
    return view('About');
});

Route::get('/admin',function(){
    return view('Admin.adminmaster');
});

Route::resource('product',ProductController::class);

Route::resource('user',UserController::class);


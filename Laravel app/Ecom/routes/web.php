<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;


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

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/loginuser',[UserController::class,'loginUser'])->name('loginuser');



Route::middleware(AuthMiddleware::class)->group(function(){
        Route::get('/profile',[UserController::class,'profile'])->name('profile');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');     
});

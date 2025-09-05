<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdcutController;
use App\Http\Middleware\ChechAge;
use Illuminate\Http\Request;



Route::get('reg',function(){
    return view('form');
});
Route::get('/home1',[TesController::class,'commanFunction']);

Route::post('/checkage',function(){
    echo "success";
})->name('checkage')->middleware(ChechAge::class);

Route::get('/test',function(Request $request){
    echo $request->path();
    echo "<br>";
    echo  $request->url();;
});

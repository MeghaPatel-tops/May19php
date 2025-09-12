<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdcutController;
use App\Http\Middleware\ChechAge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;





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


Route::get('/addtocart',function(){
    return redirect('/cart');
});

Route::get('/cart',function(){
    echo "<h1>View cart</h1>";
});

Route::resource('product',ProdcutController::class);


Route::get('/allusers',function(){
    $users =[
        ["name"=>"megha","email"=>"m@gmail.com"],
        ["name"=>"malay","email"=>"malay@gmail.com"],
        ["name"=>"mihir","email"=>"mihir@gmail.com"],
    ];

    return response()->json($users);
});


Route::get('/flowers',function(){
   
  dd(mime_content_type(public_path('flower1.jpg')));
});

Route::get('/dbcheck',function(){
       // $posts= DB::table('post')->first();

      // $posts= DB::table('employee')->where('department_id',1)->first();
     //$posts= DB::table('employee')->where('department_id',1)->value('email');
    //$emp = DB::table('employee')->find(10);
    //$emp = DB::table('employee')->pluck('email');
//     $emp = DB::table('employee')->orderBy('id')->chunk(5, function (Collection $emp) {
//     foreach ($emp as $singleEmp) {
//          echo $singleEmp->name;
//          echo "<br>";
//     }
// });
       

       //echo  $maxSalary = DB::table('employee')->max('salary');

    //    $emp = DB::table('employee')
    //          ->select('name as EmployeeName','email')->where('id',4)->first();

      // $emp = DB::table('employee')->distinct()->get();


    //   $emp = DB::table('employee')
    //         ->select('department_id', DB::raw('SUM(salary) as deptwisesalary'))
    //         ->groupBy('department_id')->get();
       
    // $emp = DB::table('employee')
    //       ->join('department','department_id',"=","department.id")
    //       ->join('project','project_id',"=",'project.id')
    //       ->get();

    // $emp = DB::table('employee')
    //         ->where('salary','>',80000)
    //         ->get();

    // $emp = DB::table('employee')
    //         ->whereLike('name','p%')
    //         ->get();

    // $emp = DB::table('employee')
    //         ->whereIn('department_id',[1,2,3])
    //         ->get();

    $emp = DB::table('employee')
            ->whereBetween('joindate',['2021-01-01','2023-01-01'])
            ->get();
    
    echo "<pre>";


        print_r($emp);
});






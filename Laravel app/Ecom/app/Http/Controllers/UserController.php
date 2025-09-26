<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;




class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sessionUser = $request->session('user')->get('user');
        $categories= DB::table('catgory')->get();
        $products= DB::table('products')->get();
        $cartData = DB::table('addtocart')->where('uid',$sessionUser->uid)->get();
        $cartCount =count($cartData);
     
         return view('Home',["catData"=>$categories,'products'=>$products,"cartCount"=>$cartCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
         return view('User.Registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validate = $request->validate([
            'username'=>'required',
            'email'=>'required|unique:appuser',
            'password'=>'required|max:8',
            'contact'=>'required',
            'profileimg'=>'required',
         ]);


         $file = $request->file('profileimg');
         $path = $file->store('uploads','public');
         $fileOriginalName = $file->getClientOriginalExtension();
            $fileNewName = time() .'.'. $fileOriginalName;
             $file->storeAs('uploads', $fileNewName, 'public');
         
         $result= DB::table('appuser')->insert([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'contact'=>$request->contact,
            'profileimg'=>$path,
         ]);

         if(isset($result)){
            echo "data successfully inserted";
         }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(){
          return view('User.login');
    }

    public function loginUser(Request $request){
        
        
        $userEmail= [
            'email'=>$request->email
        ];
         $userData = DB::table('appuser')->where($userEmail)->first();
         if(isset($userData)){
             if (Hash::check($request->password,$userData->password)) {
                    $request->session()->put('user',$userData);
                     if($request->rem){
                        $emailcookie= Cookie::queue('email',$request->email,3600);
                    $passcookie= Cookie::queue('pwd',$request->password,3600);
    
                    }
                    return redirect('/');
                   

            }
            else{
                echo "fail";
            }
         }
         else{
                echo "fail";
            }
    }

    public function profile(Request $request){
           $currentUser =$request->session()->get('user');
                return view('User.profile',['user'=>$currentUser]);
           
           
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/login');
    }

    public function getProduct(Request $request){
          $id= $request->id;
          if(isset($id)){
            $products= DB::table('products')->where('catid',$id)->get();
          }
          else{
             $products= DB::table('products')->get();
          }
          return json_encode($products);
    }
}

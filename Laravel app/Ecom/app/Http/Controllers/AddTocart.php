<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddTocart extends Controller
{
    function addcart(Request $request){
        $pid= $request->pid;
         $sessionUser = $request->session('user')->get('user');
         $uid= $sessionUser->uid;
        $res = DB::table('addtocart')->insert([
            'uid'=>$uid,
            'pid'=>$pid,
            'qty'=>1
        ]);
        if($res){
            return redirect('/');
        }

    }

    function viewcart(Request $request){
        $categories= DB::table('catgory')->get();
        
        $sessionUser = $request->session('user')->get('user');
        $uid= $sessionUser->uid;
        
        $cartData = DB::table('addtocart')
        ->join('products','addtocart.pid',"=","products.pid")
        ->where('uid',$sessionUser->uid)->get();

        $cartCount =count($cartData);
     

        return view('User.cart',["catData"=>$categories,'cartdata'=>$cartData,"cartCount"=>$cartCount]);

    }
}

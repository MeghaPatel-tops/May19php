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

    function order(Request $request){
    $sessionUser = $request->session('user')->get('user');
    $uid= $sessionUser->uid;

     $cartArray = explode('-',$request->cartArray);
    
     $result = DB::table('addtocart')->whereIn('pid',$cartArray)->where('uid',$uid)->delete();
 
        $key_id = 'rzp_test_GqyF5g931GFt3g';
        $key_secret = 'adEHJoXSkpOVk8bXfzuyDKAQ';   
       
        $currency = 'INR';
        $receipt = 'receipt#001';
        $payment_capture = 1; // 1 = auto capture

        // Data to be sent in POST request
        $data = [
            'amount' => $request->amount,
            'currency' => $currency,
            'receipt' => $receipt,
            'payment_capture' => $payment_capture
        ];
         $ch = curl_init('https://api.razorpay.com/v1/orders');

        // Set required cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_POST, true); // Explicitly use POST method
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // JSON payload
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Execute request and handle response
        $response = curl_exec($ch);

        // if (curl_errno($ch)) {
        //     echo 'cURL error: ' . curl_error($ch);
        // } else {
        //    echo   $response;
            
        // }
        $res= json_decode($response);
        curl_close($ch);
         $insertData = [
        'uid'=>$uid,
        'productlist'=>$request->pidArray,
        'total'=>$request->amount,
        'rzp_id'=>$res->id,

     ];
     DB::table('table_order')->insert($insertData);

       

        return $response;

    }

    function payment(Request $request){
       try {
            $sessionUser = session('user');
        $uid = $sessionUser->uid ?? null;
            $insertArray =[
                'rzp_order_id' =>$request->razorpay_order_id,
                'rzp_payment_id'=>$request->razorpay_payment_id,
                'rzp_signature'=>$request->razorpay_signature,
                'uid'=>$uid,
                'created_at'=>now()
            ];
    
       DB::table('payment')->insert($insertArray);
         return redirect()->route('success')->with(['msg'=>"successs",'pro'=>$insertArray]);
       } catch (\Throwable $th) {
        return redirect()->route('fail')->with(['err'=> $th->getMessage()]);
       }

    }
}

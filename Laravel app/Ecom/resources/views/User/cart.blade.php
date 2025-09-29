@extends('master')

@section('content')
    <div class="container">
         <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>qty</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php  
                         $total = 0;
                         $pidArray = [];
                         $cartArray=[];
                    @endphp
                    @foreach($cartdata as $key)
                        <tr>
                            <td><img src="{{ asset('uploads/product/' . $key->image) }}" alt="" height="100px" width="100px"></td>
                            <td>{{$key->pname}}</td>
                            <td>{{$key->price}}</td>
                            <td>{{$key->qty}}</td>
                            <td>{{$key->price * $key->qty}}</td>
                        </tr>
                         @php  
                         $total+=($key->price * $key->qty);
                         $cartArray[]=$key->cartid;
                         $pidArray[]=$key->pid;
                    @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan=5 >Total:{{$total}} <button class="btn btn-primary" onclick="order()">Paynow</button></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
    </div>
  </section>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   
   
  

function order(){
    alert("{{  $total;}}")
    alert("mnbnmbmnb");

        
        $.ajax({
          method:"POST",  
          url:'/order',
          data:{amount:"{{$total}}","_token":"{{csrf_token()}}","cartArray":"{{implode('-',$cartArray)}}","pidArray":"{{implode('-',$pidArray)}}"},
          success:function(data){
           alert(data)
           console.log(data)
           data = JSON.parse(data)
            alert(data.id) 
             var options = {
       "key": "rzp_test_GqyF5g931GFt3g", 
       "amount": "<?php echo $total;?>", 
       "currency": "INR",
       "name": "Dummy Academy",
       
       "order_id": data.id,  
       "handler": function (response){
           console.log(response)
           alert("This step of Payment Succeeded");
       },
       "prefill": {
          //Here we are prefilling random contact
         "contact":"9876543210", 
           //name and email id, so while checkout
         "name": "Twinkle Sharma",  
         "email": "smtwinkle@gmail.com"  
       }
   };
   var razorpayObject = new Razorpay(options);
   console.log(razorpayObject);
   razorpayObject.open();
       e.preventDefault();
   razorpayObject.on('payment.failed', function (response){
         console.log(response);
         alert("This step of Payment Failed");
   });    
          }
        })
   }
</script>
  @endsection
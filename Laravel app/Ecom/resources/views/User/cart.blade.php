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
                    @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan=5 >Total:{{$total}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
    </div>
  </section>
  @endsection
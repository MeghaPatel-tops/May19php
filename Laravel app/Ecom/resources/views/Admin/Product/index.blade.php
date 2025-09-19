@extends('Admin.adminmaster')
@section('content')

@session('msg')
 <p class ="alert alert-success">
       {{$value}}
 </p>
@endsession

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Product </h1>
<a href="{{route('product.create')}}" class="btn btn-primary">Add New</a>
 <table class="table table-borderd" >
       <thead>  
         <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
               
         </tr>
        

         @if(isset($products))
                @foreach($products as $key)
                     <tr>
                        <td>{{$key->pname}}</td>
                        <td>{{$key->price}}</td>
                        <td>{{$key->description}}</td>
                        <td>{{$key->cname}}</td>
                        <td><img src="{{ asset('uploads/product/' . $key->image) }}" alt="" heigth="100px" width="100px">
                        </td>
                        <td>
                            <form action="{{route('product.destroy',$key->pid)}}" method="post">
                            
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                        <td>
                            <a href="{{route('product.edit',$key->pid)}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>

                @endforeach

         @endif
           
       </thead>
      
@endsection()
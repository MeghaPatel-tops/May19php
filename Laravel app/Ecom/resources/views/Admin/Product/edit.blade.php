@extends('Admin.adminmaster')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Product Create Form</h1>
       <form method="post" enctype="multipart/form-data" action="{{route('product.update',$product->pid)}}">
                @csrf
                @method('put')
                 <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                    <select name="catid" id="" class="form-control">
                        <option value="">-----------------------</option>
                        @foreach($category as $key)
                            <option value="{{$key->id}}"
                            {{ ($key->id == $product->catid) ? "selected" :""}}
                            >{{$key->cname}}</option>


                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ProductName</label>
                    <input type="text" class="form-control" id="" name="pname" value="{{$product->pname}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="" name="description" value="{{$product->description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                     <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" heigth="100px" width="100px">
                     <input type="hidden" name="img1" value="{{$product->image}}">
                    <input type="file" class="form-control" id="" name="pimage">
                </div>
               
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection()
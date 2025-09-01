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
       <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ProductName</label>
                    <input type="text" class="form-control" id="" name="pname">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="" name="decription">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="" name="pimage">
                </div>
               
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection()
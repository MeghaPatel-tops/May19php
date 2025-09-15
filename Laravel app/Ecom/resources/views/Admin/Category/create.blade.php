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
<h1>Vategory Add</h1>
       <form method="post" enctype="multipart/form-data" action="{{route('category.store')}}">
                @csrf
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="" name="categoryname">
                </div>
             
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="" name="categoryimage">
                </div>
               
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection()
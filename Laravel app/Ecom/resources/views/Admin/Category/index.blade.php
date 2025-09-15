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
 <h1>View Category</h1>
 <a href="{{route('category.create')}}" class="btn btn-primary">Add</a>
 <table class="table table-borderd" >
       <thead>  
         <tr>
                <th>CategoryName</th>
                <th>Image</th>
                <th>Action</th>
               
            </tr>
           
       </thead>
       <tbody>
         @if(isset($catData))
                @foreach($catData as $key)
                 <tr>
                <td>{{$key->cname}}</td>
                  <td>              
                     <img src="{{ asset('uploads/category/' . $key->cimage) }}" alt="" heigth="100px" width="100px">
                     <td>
                        <form action="{{route('category.destroy',$key->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                     </td>
                     <td>
                        <a href="{{route('category.edit',$key->id)}}" class="btn btn-success">Edit</a>
                     </td>
                    </td>
            </tr>
                @endforeach
        @endif

       </tbody>
 </table>
  
@endsection()
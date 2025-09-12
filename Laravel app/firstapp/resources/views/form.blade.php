<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        @if (session('msg'))
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
    @endif
    <form action="{{route('checkage')}}" method="post">
        @csrf
        <input type="text" name="age" id="">
        <input type="submit" value="Add">
    </form>

    <fieldset>
        <legend>Add Product</legend>
        <form action="{{route('product.store')}}" method="post">
            @csrf
            <label for="">Enter Ptoduct Name</label>
            <input type="text" name="pname" id="">

            <br><br>
            <input type="submit" value="Add">
        </form>
    </fieldset>
   
</body>
</html>
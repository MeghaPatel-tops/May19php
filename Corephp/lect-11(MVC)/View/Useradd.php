htm<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
   if(isset($_SESSION['msg'])){
    foreach($_SESSION['msg'] as $key){
          echo '<div class="alert alert-danger" role="alert">'.
            $key.'
        </div>';
    }
    
        session_destroy();
   }
  ?>
<div class="container mt-3">
   
  <h2>User Forms</h2>

  <form method="POST" action="userstore">
    <div class="row"><div class="col">
        <input type="text" class="form-control" placeholder="Enter Username" name="username">
      </div></div>
    <div class="row mt-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="Enter email" name="email">
      </div>
      <div class="col">
        <input type="password" class="form-control" placeholder="Enter password" name="pswd">
      </div>
    </div>
    <div class="row mt-5">
        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
    </div>
  </form>
</div>

</body>
</html>

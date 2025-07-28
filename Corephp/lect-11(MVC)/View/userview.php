<!DOCTYPE html>
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
   
  <h2>User Data</h2>

  <table class="table table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Action</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($userData as $key){
            ?>
                <tr>
                <td><?php echo $key->username?></td>
                <td><?php echo $key->email?></td>
                <td><a class="btn btn-danger" href="deleteuser?uid=<?php echo $key->id;?>">DELETE</a></td>
                <td>
                   <a class="btn btn-success" href="edituser?uid=<?php echo $key->id;?>">Edit</a> 
                </td>
                </tr>
            <?php
        }
    
    ?>
  </tbody>
</table>
</div>

</body>
</html>

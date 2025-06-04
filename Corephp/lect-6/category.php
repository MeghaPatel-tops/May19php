<?php  
   include('db.php');
   $query= "select * from category";
   $req = $connection->query($query);
   while($row= $req->fetch_object()){
        $categoryArray[]=$row;
   }
  //  echo "<pre>";
  //  print_r($categoryArray);
  //  exit;
?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <?php  include('head.php');?>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
     <?php include('navbar.php')?>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include('asidebar.php')?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
       
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
           <h1>Category  Details</h1><table class="table">
            <p><a href="categoryadd.php" class="btn btn-primary">Add New</a></p>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">CategoryName</th>
      <th scope="col">Image</th>
      <th colspan=2>Action</th>
      
    </tr>
  </thead>
  <tbody>
        <?php
          $i=1;
           if(isset($categoryArray)){
             foreach($categoryArray as $key){
                ?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $key->cname?></td>
                    <td><img src="uploads/<?php echo $key->cimage?>" alt="" height="50px" width="50px"></td>
                    <td>
                      
                    <a href="categorydelete.php?cid=<?php echo $key->cid?>" class="btn btn-danger">Delete</a>



                      <a href="categoryedit.php?cid=<?php echo $key->cid;?>" class="btn btn-success">Edit</a>
                    </td>
                  </tr>

              <?php
              $i++;
            }
           }
        
        ?>
  </tbody>
</table>


          
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   <?php include('footer.php')?>
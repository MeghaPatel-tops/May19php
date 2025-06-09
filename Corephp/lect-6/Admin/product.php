<?php
include('db.php');
$query = "SELECT * FROM products join category on products.categoryId = category.cid;";
$req = $connection->query($query);

while($row= $req->fetch_object()){
    $productData[]=$row;
}

// echo "<pre>";
// print_r($productData);
// exit;



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
           <h1>Product  Details</h1><table class="table">
            <p><a href="productadd.php" class="btn btn-primary">Add New</a></p>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th>Image</th>
      <th>CategoryId</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
     <?php
     $i=1;
       if(isset($productData)){
           foreach($productData as $key){
            ?>
               <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $key->productName;?></td>
                    <td><?php echo $key->price;?></td>
                    <td><?php echo $key->description;?></td>
                    <td><img src="uploads/<?php echo $key->productImage;?>" alt="" height="50px" width="50px"></td>
                     <td><?php echo $key->cname;?></td>
                     <td><button class="btn btn-danger" onclick="deleteProduct(<?php echo $key->pid?>)">Delete</button>
                    <a href="editproduct.php?pid=<?php echo $key->pid?>" class="btn btn-success">Edit</a>
                    
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
   
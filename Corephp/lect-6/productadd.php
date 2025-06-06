<?php
include('db.php');
$query= "select * from category";
$res= $connection->query($query);

while($row = $res->fetch_object()){
     $categoryArray[]=$row;
}


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
          <h1>Add New Product</h1>
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category" id=""  class="form-control">
                      <option value="">----------select ----------</option>
                      <?php
                      foreach($categoryArray as $key){
                        ?>
                          <option value="<?php echo $key->cid?>"><?php echo $key->cname?></option>
                        <?php
                      }
                      
                      ?>
                    </select>
                </div>
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

<?php
      if(isset($_POST['submit'])){
        $cid = $_POST['category'];
        $pname= $_POST['pname'];
        $price = $_POST['price'];
        $description = $_POST['decription'];

        //filename+timestamp
        //size mb restrict
        //jpeg jpg png


        if(isset($_FILES['pimage']['name'])){
            $filename = $_FILES['pimage']['name'];
            $tempname = $_FILES['pimage']['tmp_name'];
            move_uploaded_file($tempname,"uploads/".$filename);
        }
        echo $query = "insert into products(categoryId,productName,price,description,productImage)values(
        '$cid','$pname','$price','$description','$filename')";

        $result = $connection->query($query);

        if($result){
           echo "<script>alert('Data insert successfully');
                 window.location.href='product.php';
                 </script>";
        }
        else{
          echo "<script>alert('Something wrong')</script>";
        }

      }


?>
          
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   <?php include('footer.php')?>
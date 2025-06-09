<?php
include('db.php');
$query= "select * from category";
$res= $connection->query($query);

while($row = $res->fetch_object()){
     $categoryArray[]=$row;
}

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $productquery  = "select * from products where pid=$pid";
    $req = $connection->query($productquery);
    $singleProduct = $req->fetch_object();

    // echo "<pre>";
    // print_r($singleProduct);
    // exit;
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
                          <option value="<?php echo $key->cid?>"
                          <?php echo  ($key->cid==$singleProduct->categoryId)?"selected":"";?>
                          
                          ><?php echo $key->cname?></option>
                        <?php
                      }
                      
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ProductName</label>
                    <input type="text" class="form-control" id="" name="pname" value="<?php echo $singleProduct->productName?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="" name="price"  value="<?php echo $singleProduct->price?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="" name="decription" value="<?php echo $singleProduct->description?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img src="uploads/<?php echo $singleProduct->productImage?>" alt="" height="50px" width="50px">
                    <input type="hidden" name="hiddenimg" value="<?php echo $singleProduct->productImage?>">
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


        if(isset($_FILES['pimage']['name']) && $_FILES['pimage']['name']!= ""){
            $filename = $_FILES['pimage']['name'];
            $tempname = $_FILES['pimage']['tmp_name'];
            move_uploaded_file($tempname,"uploads/".$filename);
        }
      else{
           $filename =$_POST['hiddenimg'];
      }
        echo $query = "update products set productName='$pname',price='$price',categoryId='$cid',description='$description',productImage='$filename' where pid= $pid ";

        $result = $connection->query($query);

        if($result){
           echo "<script>alert('Data update successfully');
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

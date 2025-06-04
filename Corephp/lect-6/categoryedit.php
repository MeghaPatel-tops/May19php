<?php
include('db.php');
   if(isset($_REQUEST['cid'])){
        $cid = $_REQUEST['cid'];
        $query = "select * from category where cid=$cid";
        $req= $connection->query($query);
        $catData = $req->fetch_object();
        
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
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="" name="cname" value="<?php echo $catData->cname?>">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img src="uploads/<?php echo $catData->cimage?>" alt="" height="50px" width="50px">
                    <input type="file" class="form-control" id="" name="cimage">

                    <input type="hidden" name="himg" value="<?php echo $catData->cimage?>">
                </div>
               
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
          
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   <?php include('footer.php')?>

   <?php
   include('db.php');
      if(isset($_POST['submit'])){
           $cname = $_POST['cname'];
            if($cname == ""){
                echo "<script>alert('Enter Valid username')</script>";
                exit;
            }
            if(isset($_FILES['cimage']['name'])  && $_FILES['cimage']['name'] != ""){
                $filename = $_FILES['cimage']['name'];
                $tempPath = $_FILES['cimage']['tmp_name'];
                $size = $_FILES['cimage']['size'];
                move_uploaded_file($tempPath,"uploads/".$filename);
            }
            else{
                 $filename = $_POST['himg'];
            }

           

            $query= "update category set cname= '$cname', cimage = '$filename' where cid=$cid";
            $res = $connection->query($query);
            if($res){
                 echo "<script>alert('Data update successfully');
                 window.location.href='category.php';
                 </script>";
                 //header("Location:category.php");
            }
            else{
                 echo "<script>alert('Something wrong')</script>";
            }
      }
   
   
   ?>
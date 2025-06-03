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
              <form>
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
               
                <button type="submit" class="btn btn-primary">Submit</button>
</form>
          
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   <?php include('footer.php')?>
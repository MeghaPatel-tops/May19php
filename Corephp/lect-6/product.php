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
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


          
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   <?php include('footer.php')?>
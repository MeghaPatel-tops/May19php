<?php
  include('../db.php');
 if(isset($_SESSION['user'])){
    $uid = $_SESSION['user']->uid;
     $query= "SELECT * FROM `cart` join products on cart.pid = products.pid where uid=$uid;";
    $req= $connection->query($query);
    while($row = $req->fetch_object()){
        $productData[]=$row;
    }
     $count = count($productData);  
  }
  else{
       echo "<script>alert('Login first');
          window.location.href='login.php';
          </script>";
  }

 
 
 
  


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    .badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
}
  </style>
</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      <?php
        if(isset($_SESSION['user'])){
            ?>
             <li><a href="#"><span class="glyphicon glyphicon-user"></span>
        <?php echo ucfirst($_SESSION['user']->uname)?>
      
      </a></li>
        <li><a href="logout.php">Logout</span>   
      
      </a></li>
            <?php
        }
        else{
          ?>
            <li><a href="login.php">LogIn</span>
          <?php
        }
      
      ?>
       
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> <span class='badge badge-warning' id='lblCartCount'> <?php echo $count ?? 0?></span>Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <h1>Cart Data</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ProductName</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    
                </tr>

            </thead>
            <tbody>
                <?php
                $total =0;
                  foreach($productData as $key){
                       $total= $total + ($key->qty * $key->price);
                        ?>
                         <tr>
                            <td><?php echo $key->productName?></td>
                            <td><img src="../Admin/uploads/<?php echo $key->productImage?>" alt="" height="50px" width="50px"></td>
                            <td><?php echo $key->price?></td>
                            <td>
                                <a href="commancode.php?cartremove&cartid=<?php echo $key->cid;?>&qty=<?php echo $key->qty;?>" class="btn btn-success btn-sm">-</a>
                                <?php echo $key->qty?>
                                 <a href="commancode.php?cartadd&cartid=<?php echo $key->cid;?>&qty=<?php echo $key->qty;?>" class="btn btn-success btn-sm">+</a>
                            </td>
                            <td><?php echo $key->price * $key->qty?></td>
                         </tr>                       
                        <?php
                  }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" align="right"><b>Grand Total:<?php echo $total;?></b>
                    <button class="btn btn-primary" id="pay-button">PayNow</button>
                </td>
                </tr>
            </tfoot>
        </table>
   
      
    </div>
      
    
   
   
 



<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>
<!--Inside index.html -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   var options = {
       "key": "rzp_test_GqyF5g931GFt3g", 
       "amount": "49900", 
       "currency": "INR",
       "name": "Dummy Academy",
       
       "order_id": "order_HdPuQW0s9hY9AU",  
       "handler": function (response){
           console.log(response)
           alert("This step of Payment Succeeded");
       },
       "prefill": {
          //Here we are prefilling random contact
         "contact":"9876543210", 
           //name and email id, so while checkout
         "name": "Twinkle Sharma",  
         "email": "smtwinkle@gmail.com"  
       }
   };
   var razorpayObject = new Razorpay(options);
   console.log(razorpayObject);
   razorpayObject.on('payment.failed', function (response){
         console.log(response);
         alert("This step of Payment Failed");
   });
   
   document.getElementById('pay-button').onclick = function(e){
       razorpayObject.open();
       e.preventDefault();
   }
</script>
</body>
</html>

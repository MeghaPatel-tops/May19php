<?php
// Include the Razorpay PHP library
require('test.php');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
$api_key = 'rzp_test_GqyF5g931GFt3g';
$key_secret = 'adEHJoXSkpOVk8bXfzuyDKAQ';   
       

$res =createOrder(200);

$order= json_decode($res);
// echo "<pre>";
// print_r($resArray);
// exit;



$callback_url = "http://localhost/May19php/Corephp/lect-6/users/success.php";

// Include Razorpay Checkout.js library
echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';

// Create a payment button with Checkout.js
echo '<button onclick="startPayment()">Pay with Razorpay</button>';

// Add a script to handle the payment
echo '<script>
    function startPayment() {
        var options = {
            key: "' . $api_key . '",
            amount: ' . $order->amount . ',
            currency: "' . $order->currency . '",
            name: "Your Company Name",
            description: "Payment for your order",
            image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
            order_id: "order_QDj3AulkpOtKYW",
            theme:
            {
                "color": "#738276"
            },
            callback_url: "' . $callback_url . '"
        };
        var rzp = new Razorpay(options);
        rzp.open();
    }
</script>';
?>

<?php





            $key_id = 'rzp_test_GqyF5g931GFt3g';
        $key_secret = 'adEHJoXSkpOVk8bXfzuyDKAQ';   
       
        $currency = 'INR';
        $receipt = 'receipt#001';
        $payment_capture = 1; // 1 = auto capture

        // Data to be sent in POST request
        $data = [
            'amount' => $_REQUEST['amount'],
            'currency' => $currency,
            'receipt' => $receipt,
            'payment_capture' => $payment_capture
        ];

        // Initialize cURL session
        $ch = curl_init('https://api.razorpay.com/v1/orders');

        // Set required cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_POST, true); // Explicitly use POST method
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // JSON payload
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Execute request and handle response
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
           echo   $response;
            
        }

        curl_close($ch);



?>
<?php
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-ITrxY68FSWG32QXlU9c6Hyz8';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Extract form data from POST request
$postData = json_decode(file_get_contents('php://input'), true);

// Assuming the price of "Booking Table" is 80000 and quantity is 1 for simplicity
$itemDetails = array(
    array(
        'id' => '1', // Example item ID
        'price' => 80000,
        'quantity' => 1,
        'name' => 'Booking Table'
    )
);

// Calculate gross amount dynamically
$grossAmount = 0;
foreach ($itemDetails as $item) {
    $grossAmount += $item['price'] * $item['quantity'];
}

// Use form data for customer details and transaction details
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $grossAmount,
    ),
    'item_details' => $itemDetails,
    'customer_details' => array(
        'first_name' => $postData['name'], // Use form data
        'email' => $postData['email'], // Use form data
        'phone' => $postData['phone'], // Use form data
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;

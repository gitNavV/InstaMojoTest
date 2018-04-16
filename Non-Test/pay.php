<?php

$product_name = $_POST["product_name"];
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('a2588abb9e89526095c49b6397241b1f', 'ad666569fef2e24096520df786c1fa43');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://imojo.000webhost.com/thankyou.php",
        "webhook" => "https://imojo.000webhost.com/webhook.php"
    ));

    $pay_url = $response['longurl'];

    header("Location: $pay_url");
    exit();
}

catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>

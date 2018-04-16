<?php

$product_name = $_POST["product_name"];
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_8dc9d7a1f6f52fdbc41051df624', 'test_c6b541be17d68de8193b4504557','https://test.instamojo.com/api/1.1/');

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
        "redirect_url" => "thankyou.php",
        "webhook" => "webhook.php"
    ));

    $pay_url = $response['longurl'];

    header("Location: $pay_url");
    exit();
}

catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>

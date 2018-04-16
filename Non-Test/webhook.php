<?php

$data = $_POST;
$mac_provided = $data['mac'];
unset($data['mac']);

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
    ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
    uksort($data, 'strcasecmp');
}

$mac_calculated = hash_hmac("sha1", implode("|", $data), "a50a9246f55342dcbfc44d0de69887ec");

if($mac_provided == $mac_calculated){
    echo "MAC OK";
    if($data['status'] == "Credit"){
                $to = 'mail@domain.com';
                $subject = 'Website Payment Request ' .$data['buyer_name'].'';
                $message = "<h1>Payment Details</h1>";
                $message .= "<hr>";
                $message .= '<p><b>ID:</b> '.$data['payment_id'].'</p>';
                $message .= '<p><b>Amount:</b> '.$data['amount'].'</p>';
                $message .= "<hr>";
                $message .= '<p><b>Name:</b> '.$data['buyer_name'].'</p>';
                $message .= '<p><b>Email:</b> '.$data['buyer'].'</p>';
                $message .= '<p><b>Phone:</b> '.$data['buyer_phone'].'</p>';

                $message .= "<hr>";

                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to, $subject, $message, $headers);
    }
    else{

    }
}
else{
    echo "MAC Fail";
}
?>

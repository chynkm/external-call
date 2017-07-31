<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'alertbox');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$parameters = json_encode($_REQUEST);
$smpp_code = `./externalcall_mac64 $parameters`;

$sql = "INSERT INTO sms(source, destination, shortcode, message, smpp_code, created_at)
    VALUES ({$_REQUEST['source']}, {$_REQUEST['destination']}, '{$_REQUEST['shortcode']}', '{$_REQUEST['message']}', '{$smpp_code}', now())";

$result = $conn->query($sql);
$conn->close();

echo json_encode(['status' => $result]);


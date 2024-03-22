<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './backend.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['choice'])) {
    $choice = $_POST['choice'];
    $back = new backend();
    if ($choice === 'register') {
      error_log("Register - HANDLER");
      echo $back->register($_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], $_POST['address'], $_POST['company_name'], $_POST['purpose'], $_POST['host'], $_POST['requires_wifi']);
      // echo "Testing: $choice";
    }
  }
}
?>


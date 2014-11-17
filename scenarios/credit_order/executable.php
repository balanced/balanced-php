<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$order = Balanced\Order::get("/orders/OR3BXTqXewuSy1Cu3g6N2Sjj");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA2gul8YMjFWnFk0fFHXwX6g/credits");
$order->creditTo(
    $bank_account,
    "5000"
);


?>
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$order = Balanced\Order::get("/orders/OR3vURGwVtqDnnkRS9fgH41G");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA45anEaEr8g0lOhzhcE9VAN/credits");
$order->creditTo(
    $bank_account,
    5000
);


?>
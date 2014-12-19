<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$order = Balanced\Order::get("/orders/OR483MoeOnJEXwkxqoPdnDF3");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA4UZsYXpf2BX97v5WPaT57O/credits");
$order->creditTo(
    $bank_account,
    "5000"
);


?>
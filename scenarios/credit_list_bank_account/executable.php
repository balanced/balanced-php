<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$bank_account = Balanced\BankAccout::get("/bank_accounts/BA1D19WqGc3j78IAhFIkasQd");
$bank_account->credits->query()->all();

?>
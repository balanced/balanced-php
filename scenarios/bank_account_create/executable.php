<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$bank_account = new \Balanced\BankAccount(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
));

$bank_account->save();

?>
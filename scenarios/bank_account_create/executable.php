<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$marketplace = \Balanced\Marketplace::mine();
$bank_account = $marketplace->bank_accounts->create(array(
    "account_number" => "9900000001",
    "account_type" => "checking",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
));

$bank_account->save();

?>
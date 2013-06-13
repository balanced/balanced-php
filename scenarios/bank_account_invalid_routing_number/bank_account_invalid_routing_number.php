<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$bank_account = new Balanced\BankAccount(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "111111118",
    "type" => "checking",
));
try {
    $bank_account->save();
}
catch(Balanced\Errors\InvalidRoutingNumber $e) {
  // handle error here
}
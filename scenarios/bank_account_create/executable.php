<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$marketplace = \Balanced\Marketplace::mine();
$bank_account = $marketplace->bank_accounts->create(array(
    "account_number" => "9900000001",
    "account_type" => "checking",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
));

$bank_account->save();

?>
% if mode == 'definition':
Balanced\Credit::bankAccount()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$bank_account_info = array(
    "account_number" => "9900000002",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
);
$credit = Balanced\Credit::bankAccount(
    10000,
    $bank_account_info
);
% endif
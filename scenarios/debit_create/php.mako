% if mode == 'definition':
Balanced\Buyer->debit()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$buyer = Balanced\Account::get("");
$buyer->debit(
    "5000",
    "Statement text",
    "Some descriptive text for the debit in the dashboard"
);
% endif
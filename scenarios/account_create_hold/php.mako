% if mode == 'definition':
\Balanced\Account->debit();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/accounts/AC41WWE1V0nZtw5J8BicNwnB");
$account->hold('1000');
% endif
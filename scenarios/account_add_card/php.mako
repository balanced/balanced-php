% if mode == 'definition':
\Balanced\Account->addCard();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP64bmAzypIUS0SUZ4qkoFqG/accounts/AC6x0RfYdlHM6EV2G2ZTq0K2");
$account->addCard("/v1/marketplaces/TEST-MP64bmAzypIUS0SUZ4qkoFqG/cards/CC6yon5Mb6xKmV3dmLRuAXaT");
% endif
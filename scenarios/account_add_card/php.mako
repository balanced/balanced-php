% if mode == 'definition':
\Balanced\Account->addCard();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/accounts/AC2CcqNuwOGPFi8oaeeVik6y");
$account->addCard("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/cards/CC2DQ8AbcEnU9KQ0DDOavq36");
% endif

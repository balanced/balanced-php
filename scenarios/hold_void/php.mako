% if mode == 'definition':
Balanced\Hold->void()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$hold = Balanced\Hold::get("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/holds/HL3hEt8bLti69i3rvYVuQ2WC");
$hold->void();
% endif
% if mode == 'definition':
Balanced\Refund::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$refund = Balanced\Refund::get("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/refunds/RF3n0NOGtl7IeHTwp1c5Bvfw");
% endif
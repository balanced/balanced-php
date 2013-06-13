% if mode == 'definition':
Balanced\Marketplace::mine()->refunds

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$marketplace = Balanced\Marketplace::mine();
$refunds = $marketplace->refunds->query()->all();
% endif
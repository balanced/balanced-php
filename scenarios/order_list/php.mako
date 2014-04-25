%if mode == 'definition':
Balanced\Marketplace::mine()->orders

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$marketplace = Balanced\Marketplace::mine();
$orders = $marketplace->orders->query()->all();

?>
%endif
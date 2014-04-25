%if mode == 'definition':
Balanced\Credit->reverses->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$credit = Balanced\Credit::get("/credits/CR6nBcaGvGc4dtflEB1bjKBP");
$credit->reversals->create();

?>
%endif
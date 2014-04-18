%if mode == 'definition':
Balanced\Credit->reverses->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$credit = Balanced\Credit::get("/credits/CR1KskgNXcoA6e52QczoCYyF");
$credit->reversals->create();

?>
%endif
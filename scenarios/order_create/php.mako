%if mode == 'definition':
Balanced\Customer->orders->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$merchant = Balanced\Customer::get("/customers/CU1eX3FIMntmCLmi2VfWA2db");
$order = $merchant->orders->create();

?>
%endif
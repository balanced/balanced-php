%if mode == 'definition':
Balanced\Marketplace::mine()->refunds

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$marketplace = Balanced\Marketplace::mine();
$refunds = $marketplace->refunds->query()->all();

?>
%endif
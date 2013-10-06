%if mode == 'definition':
Balanced\Marketplace::mine()->debits

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$marketplace = Balanced\Marketplace::mine();
$debits = $marketplace->debits->query()->all();

?>
%endif
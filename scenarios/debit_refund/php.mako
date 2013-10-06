%if mode == 'definition':
Balanced\Debit->refund()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/debits/WD2jklEbzgwLjRiEPpIbWOs");
$debit->refund();

?>
%endif
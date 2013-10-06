%if mode == 'definition':
Balanced\Hold->capture()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$hold = Balanced\Hold::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/holds/HL1a9V1z4YLJd0vTGWOvXxs2");
$debit = $hold->capture();

?>
%endif
%if mode == 'definition':
Balanced\Refund::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$refund = Balanced\Refund::get("/v1/customers/CUuDKfPHvZhTmaNbEsg1BOO/refunds/RFHBiohkzkfO6RPYOrjc9US");

?>
%endif
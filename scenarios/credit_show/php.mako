%if mode == 'definition':
Balanced\Credit::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$credit = Balanced\Credit::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/credits/CR6Y384863fzeb73YbW5NHVe");

?>
%endif
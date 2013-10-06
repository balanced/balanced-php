%if mode == 'definition':
Balanced\BankAccountVerification::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA6jdVg9pWO5ePNdL8ucclXi/verifications/BZ6lvRngcv6BuAu5m5XZAx8A");

?>
%endif
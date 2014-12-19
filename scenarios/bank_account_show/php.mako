%if mode == 'definition':
Balanced\BankAccount::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3gt4RLskm2w09aXHPDaCb3");

?>
%endif
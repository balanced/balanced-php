%if mode == 'definition':
\Balanced\Account->addBankAccount();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/accounts/CU4WT2fC14gzGQIEcMKs5gm3");
$account->addBankAccount("/v1/bank_accounts/BA53NVwHAXYx7fo98SdK41dg");

?>
%endif
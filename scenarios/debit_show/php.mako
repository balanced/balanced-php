%if mode == 'definition':
Balanced\Debit::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/debits/WD6Ca1z3nrRRCdiYT1evN19S");

?>
%endif
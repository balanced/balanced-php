%if mode == 'definition':
Balanced\Debit::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$debit = Balanced\Debit::get("/debits/WDLlpoutDUH8fGfp28GeT0V");

?>
%endif
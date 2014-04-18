%if mode == 'definition':
Balanced\Card->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$card = Balanced\Card::get("/cards/CCVkCgaysaNhZH3ITVLmQ9X");
$card->associateToCustomer("/customers/CUeXNjpejPooRtSnJLc6SRD");

?>
%endif
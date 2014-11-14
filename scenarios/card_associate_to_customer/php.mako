%if mode == 'definition':
Balanced\Card->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$card = Balanced\Card::get("/cards/CC2F37Ml3zzsjgM2Wb3R7zqM");
$card->associateToCustomer("/customers/CU22iqvFZQLVa00OV3eUx7lr");

?>
%endif
%if mode == 'definition':
Balanced\Marketplace::mine()->card_holds

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$marketplace = Balanced\Marketplace::mine();
$marketplace->card_holds->query()->all();

?>
%endif
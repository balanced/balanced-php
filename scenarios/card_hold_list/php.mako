%if mode == 'definition':
Balanced\Marketplace::mine()->card_holds

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$marketplace = Balanced\Marketplace::mine();
$marketplace->card_holds->query()->all();

?>
%endif
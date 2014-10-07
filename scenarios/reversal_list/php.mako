%if mode == 'definition':
Balanced\Marketplace::mine()->reversals

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$marketplace = Balanced\Marketplace::mine();
$marketplace->reversals->query()->all();

?>
%endif
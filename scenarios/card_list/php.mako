%if mode == 'definition':
Balanced\Marketplace::mine()->cards

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$marketplace = Balanced\Marketplace::mine();
$cards = $marketplace->cards->query()->all();

?>
%endif
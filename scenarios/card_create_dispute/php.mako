%if mode == 'definition':
Balanced\Marketplace::mine()->cards->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$card = Balanced\Marketplace::mine()->cards->create(array(
    "cvv" => "123",
    "expiration_month" => "12",
    "expiration_year" => "3000",
    "number" => "6500000000000002",
));

?>
%endif
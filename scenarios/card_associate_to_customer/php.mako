%if mode == 'definition':
Balanced\Card->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$card = Balanced\Card::get("/cards/CC4fWSr1PpCAh6mlDzNfr0Gs");
$card->associateToCustomer("/customers/CU2DRnwOXfbxBlKb5CUWwWJi");

?>
%endif
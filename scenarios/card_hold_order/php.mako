%if mode == 'definition':
Balanced\Card->card_holds->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$card = Balanced\Card::get("/cards/CC48j1De9eVYELLivrgDeCM8");
$card->card_holds->create(array(
    "amount" => "5000",
    "description" => "Some descriptive text for the debit in the dashboard",
    "order" => "/orders/OR5e6wrps4tp9QarDxWa01O5",
));

?>
%endif
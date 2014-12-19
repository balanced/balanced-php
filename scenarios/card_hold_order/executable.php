<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$card = Balanced\Card::get("/cards/CC2IDFuWSoETEIxLBJ73fXgs");
$card->card_holds->create(array(
    "amount" => "5000",
    "description" => "Some descriptive text for the debit in the dashboard",
    "order" => "/orders/OR2JfBYxYlDAF3L48u9DtIEU",
));

?>
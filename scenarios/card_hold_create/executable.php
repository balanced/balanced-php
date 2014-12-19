<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$card = Balanced\Card::get("/cards/CC47wPIfNkploi0BbLRDqEYo");
$card->card_holds->create(array(
    "amount" => "5000",
    "description" => "Some descriptive text for the debit in the dashboard",
));

?>
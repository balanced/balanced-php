<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$hold = Balanced\CardHold::get("/card_holds/HL2qF0G6tJv3FPOpm8zjkweN");
$hold->void();

?>
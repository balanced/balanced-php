<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$card = Balanced\Card::get("/cards/CC3vhL91rWtwtHcOBl0ITshG");
$card->card_holds->create(array(
    "amount" => "5000",
    "description" => "Some descriptive text for the debit in the dashboard",
));

?>
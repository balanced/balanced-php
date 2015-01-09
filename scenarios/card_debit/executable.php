<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$card = Balanced\Card::get("/cards/CC4zyuNpxY0A0eAf87SeULCR");
$card->debits->create(array(
"amount" => 5000,
"appears_on_statement_as" => "Statement text",
"description" => "Some descriptive text for the debit in the dashboard",
));

?>
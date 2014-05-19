<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2jJSjIixy2qkOMmIONPtXnawOUftBDRSK";

$card = Balanced\Card::get("/cards/CC7nMc4BAti7DgvWmpGV5e6N");
$card->credits->create(array(
    "amount" => "5000",
    "description" => "Some descriptive text for the debit in the dashboard",
));

?>
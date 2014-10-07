<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$api_key = Balanced\APIKey::get("/api_keys/AK2Okba4tZ9nonYFBF3IwhZr");
$api_key->unstore();

?>
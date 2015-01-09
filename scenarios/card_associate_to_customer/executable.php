<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$card = Balanced\Card::get("/cards/CC4HDcgvzIltvwv6GSjBVbji");
$card->associateToCustomer("/customers/CU3o1ZAd8Gtxz6ZTIFK9YmsM");

?>
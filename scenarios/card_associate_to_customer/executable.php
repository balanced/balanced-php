<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$card = Balanced\Card::get("/cards/CC5OFIKHlTTxx8uysB8woICs");
$card->associateToCustomer("/customers/CU42QGL6X08UHbQnRqgCNtKg");

?>
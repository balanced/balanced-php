<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$card = Balanced\Card::get("/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/cards/CC5N3HHUDrAyvhNwQOoUd3UX");
$card->is_valid = false;
$card->save();

?>
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$buyer = Balanced\Marketplace::mine()->createBuyer(
    null,
    "/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/cards/CC4WeeR0OUiQh9vvqNQvMl1o"
);

?>
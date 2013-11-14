<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$marketplace = \Balanced\Marketplace::mine();
$hold = $marketplace->holds->create(array(
  "amount" => 5000,
  "description" => "Some descriptive text for the debit in the dashboard",
  "source_uri" => "/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/cards/CC72hXVwWbCJsozvJoRELzIc"
));

?>
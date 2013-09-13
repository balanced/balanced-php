<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$marketplace = \Balanced\Marketplace::mine();
$hold = $marketplace->holds->create(array(
  "amount" => "5000",
  "description" => "Some descriptive text for the debit in the dashboard",
  "source_uri" => "/v1/marketplaces/TEST-MP20QSIx33BcCbLmSfH5uFTA/cards/CC4tKDRzYqY4E9FLTo8WN6jB"
));

?>
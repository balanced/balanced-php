% if mode == 'definition':
Balanced\Card->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$card = Balanced\Card::get("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/cards/CC2thwNijAS2qdwoWtqanNh6");
$card->is_valid = false;
$card->save();
% endif
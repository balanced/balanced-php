% if mode == 'definition':
Balanced\Card::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$card = Balanced\Card::get("/v1/marketplaces/TEST-MP64bmAzypIUS0SUZ4qkoFqG/cards/CC6mSyhNe9lAcrUYtqAxHi1i");
% endif
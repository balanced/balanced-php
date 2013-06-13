% if mode == 'definition':
Balanced\Marketplace::mine()->cards

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$marketplace = Balanced\Marketplace::mine();
$cards = $marketplace->cards->query()->all();
% endif
% if mode == 'definition':
Balanced\Marketplace::mine()->createCard()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "",
    "",
    "",
    ""
);
% endif
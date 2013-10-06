<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "5105105105105100",
    "123",
    "12",
    "2020"
);

?>
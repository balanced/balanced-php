<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$card = Balanced\Card::unstore("/v1/bank_accounts/BA64BU1PUa8MKCAg0omlaNwm");
$card->unstore();
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "5105105105105100",
    "123",
    "12",
    "2020"
);
$customer = new Balanced\Customer();
$customer->save();
$customer->addCard($card->uri);
$card = Balanced\Card::get($card->uri);
$debit = $card->debit(10000);

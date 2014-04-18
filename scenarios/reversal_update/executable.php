<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$reversal = Balanced\Reversal::get("/reversals/RV1Lqw4ZTPoeuldngynU1z6J");
$reversal->description = 'update this description';
$reversal->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.satisfaction" => "6",
);
$reversal->save();

?>
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$reversal = Balanced\Reversal::get("/reversals/RV6AleFrrhNHBDpr9W9ozGmY");
$reversal->description = 'update this description';
$reversal->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.satisfaction" => "6",
);
$reversal->save();

?>
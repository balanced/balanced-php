<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$reversal = Balanced\Reversal::get("/reversals/RV41Rl7KRvK6mgXfGRzXsgwF");
$reversal->description = 'update this description';
$reversal->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.satisfaction" => "6",
);
$reversal->save();

?>
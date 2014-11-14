<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$credit = Balanced\Credit::get("/credits/CR4iCt4vfl53TYmDVp9g1iXr");
$credit->reversals->create();

?>
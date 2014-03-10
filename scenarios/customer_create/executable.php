<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$marketplace = Balanced\Marketplace::mine();
$customer = $marketplace->customers->create(array(
    "address" => "Array",
    "dob_month" => "7",
    "dob_year" => "1963",
    "name" => "Henry Ford",
));

?>
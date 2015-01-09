<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$customer = Balanced\Customer::get("/customers/CU3o1ZAd8Gtxz6ZTIFK9YmsM");
$accounts = $customer->accounts->query()->all();


?>
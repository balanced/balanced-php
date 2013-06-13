<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$customer = \Balanced\Customer::get("/v1/customers/CU7KsM3n0uv9cqwm94E1enVB");
$customer->addBankAccount("/v1/bank_accounts/BA7LMoiDtVIogA3dSCkb93xQ");
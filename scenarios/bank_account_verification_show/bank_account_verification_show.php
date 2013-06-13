<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$verification = Balanced\Verification::get("/v1/bank_accounts/BA2mettVyrsL0krXEXeS1kes/verifications/BZ2nq1jnVFkXGR1pxbF1qrm8");
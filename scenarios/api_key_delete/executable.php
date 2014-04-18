<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$api_key = Balanced\APIKey::get("/api_keys/AK7KGjv4YKtOf03Lqm0f84V");
$api_key->unstore();

?>
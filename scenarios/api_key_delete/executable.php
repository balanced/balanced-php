<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$api_key = Balanced\APIKey::get("/api_keys/AK5GPcrSGuD1jtq6cEctwa3j");
$api_key->unstore();

?>
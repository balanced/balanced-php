<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

Balanced\Reversal::get("/reversals/RV6AleFrrhNHBDpr9W9ozGmY");

?>
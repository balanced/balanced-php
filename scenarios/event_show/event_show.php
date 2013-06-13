<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$event = Balanced\Event::get("/v1/events/EVc75db820d3ae11e29834026ba7cac9da");
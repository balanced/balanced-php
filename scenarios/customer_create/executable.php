<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$customer = new \Balanced\Customer(array(
  "name" => "William Henry Cavendish III",
  "email" => "william@example.com",
));
$customer->save();

?>
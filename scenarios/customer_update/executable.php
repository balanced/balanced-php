<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$customer = Balanced\Customer::get("/customers/CU3SSJgvA5Z69kt05MusbPeE");
$cusotmer->email = 'email@newdomain.com';
$customer->meta = array(
    "shipping-preference" => "ground",
);
$customer->save();

?>
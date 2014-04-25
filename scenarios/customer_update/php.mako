%if mode == 'definition':
Balanced\Customer->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$customer = Balanced\Customer::get("/customers/CU4GAx8tZTDNIgAmwfV35e53");
$cusotmer->email = 'email@newdomain.com';
$customer->meta = array(
    "shipping-preference" => "ground",
);
$customer->save();

?>
%endif
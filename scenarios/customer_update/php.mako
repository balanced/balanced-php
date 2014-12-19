%if mode == 'definition':
Balanced\Customer->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$customer = Balanced\Customer::get("/customers/CU6gruzuRsaAGeHQFU4YweON");
$cusotmer->email = 'email@newdomain.com';
$customer->meta = array(
    "shipping-preference" => "ground",
);
$customer->save();

?>
%endif
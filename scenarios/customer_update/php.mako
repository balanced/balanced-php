%if mode == 'definition':
Balanced\Customer->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$customer = Balanced\Customer::get("/customers/CU5aACCvYYfV6mcWJL4TEcK1");
$cusotmer->email = 'email@newdomain.com';
$customer->meta = array(
    "shipping-preference" => "ground",
);
$customer->save();

?>
%endif
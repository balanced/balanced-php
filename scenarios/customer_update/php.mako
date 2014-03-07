%if mode == 'definition':
Balanced\Customer->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$customer = Balanced\Customer::get("/customers/CU3pCvOdgy2r0TIQ67xuSREr");
$cusotmer->email = 'email@newdomain.com';
$customer->save();

?>
%endif
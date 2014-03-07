%if mode == 'definition':
Balanced\Customer->createOrder()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$merchant = Balanced\Customer::get("/customers/CU3veCwC1nqk9GV6dfSkRHRS");
$order = $merchant->createOrder();

?>
%endif
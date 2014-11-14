%if mode == 'definition':
Balanced\Customer()->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$customer = Balanced\Customer::get("/customers/CU40AyvBB6ny9u3oelCwyc3C");
$customer->unstore();


?>
%endif
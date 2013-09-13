%if mode == 'definition':
Balanced\Customer->holds()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$customer = Balanced\Customer::get("/v1/customers/AC3I2XDeq8E1mnNGIRTtbybu");
$holds = $customer->holds->query()->all();

?>
%endif
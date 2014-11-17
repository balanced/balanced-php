%if mode == 'definition':
Balanced\Order::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

Balanced\Order::get("/orders/OR5sl2RJVnbwEf45nq5eATdz");

?>
%endif
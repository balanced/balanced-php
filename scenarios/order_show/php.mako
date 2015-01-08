%if mode == 'definition':
Balanced\Order::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

Balanced\Order::get("/orders/OR57cG7I7627Xl7Mh3OrVNn7");

?>
%endif
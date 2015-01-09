%if mode == 'definition':
Balanced\Order::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

Balanced\Order::get("/orders/OR6nHTLOYehaSU5SoxqQE5WB");

?>
%endif
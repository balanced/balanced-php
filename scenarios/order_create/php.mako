%if mode == 'definition':
Balanced\Customer->orders->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$merchant = Balanced\Customer::get("/customers/CU5AxbQrjAcjsbquafnvwaas");
$order = $merchant->orders->create();

?>
%endif
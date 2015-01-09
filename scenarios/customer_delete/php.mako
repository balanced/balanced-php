%if mode == 'definition':
Balanced\Customer()->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$customer = Balanced\Customer::get("/customers/CU5AxbQrjAcjsbquafnvwaas");
$customer->unstore();


?>
%endif
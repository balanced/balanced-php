%if mode == 'definition':
Balanced\Customer::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

Balanced\Customer::get("/customers/CU3pCvOdgy2r0TIQ67xuSREr");

?>
%endif
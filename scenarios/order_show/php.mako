%if mode == 'definition':
Balanced\Order::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

Balanced\Order::get("/orders/OR3Ol0FhtkLKUwZvw3D2frmO")

?>
%endif
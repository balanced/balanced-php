%if mode == 'definition':
Balanced\Refund::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$refund = Balanced\Refund::get("/refunds/RF4n5AfJ8MRB55oTzVWTRoVa");

?>
%endif
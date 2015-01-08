%if mode == 'definition':
Balanced\Refund::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$refund = Balanced\Refund::get("/refunds/RF4zwAHHq8ifpN3M1RLEwSJD");

?>
%endif
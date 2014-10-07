%if mode == 'definition':
Balanced\Callback->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$callback = \Balanced\Callback::get("/callbacks/CB3mB2Lz4k2lVMTmPDxL0RCJ");
$callback->unstore();

?>
%endif
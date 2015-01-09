%if mode == 'definition':
Balanced\Credit->reversals->create()


% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$credit = Balanced\Credit::get("/credits/CR5wJCGIh24U6yzbDGmWlMhL");
$credit->reversals->create();

?>
%endif
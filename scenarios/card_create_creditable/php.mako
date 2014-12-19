%if mode == 'definition':
Balanced\Marketplace::mine()->cards->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$card = Balanced\Marketplace::mine()->cards->create(array(
    "expiration_month" => "05",
    "expiration_year" => "2020",
    "name" => "Johannes Bach",
    "number" => "4342561111111118",
));

?>
%endif
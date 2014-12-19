%if mode == 'definition':
Balanced\Settlements::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$settlement = Balanced\Settlements::get("/settlements/ST5xMBEiT3t2Stt2ia4Svl2d");

?>
%endif
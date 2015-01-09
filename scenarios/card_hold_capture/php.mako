%if mode == 'definition':
Balanced\CardHold->capture();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$hold = Balanced\CardHold::get("/card_holds/HL44qbPoom3uVlTlEGBZV7z2");
$hold->capture();

?>
%endif
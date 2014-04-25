%if mode == 'definition':
Balanced\CardHold->void()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$hold = Balanced\CardHold::get("/card_holds/HL4joUazeM3BJE6emmv2Q8EF");
$hold->void();

?>
%endif
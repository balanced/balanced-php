%if mode == 'definition':
Balanced\CardHold->capture();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$hold = Balanced\CardHold::get("/card_holds/HL4bdnO7ELS2JfyJ2T8elYOl");
$hold->capture();

?>
%endif
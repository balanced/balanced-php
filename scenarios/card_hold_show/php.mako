%if mode == 'definition':
Balanced\CardHold::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

Balanced\CardHold::get("/card_holds/HL4bdnO7ELS2JfyJ2T8elYOl");

?>
%endif
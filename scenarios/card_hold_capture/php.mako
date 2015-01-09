%if mode == 'definition':
Balanced\CardHold->capture();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$hold = Balanced\CardHold::get("/card_holds/HL4iHX8OBNW7nVsu6MqyjnQ9");
$hold->capture();

?>
%endif
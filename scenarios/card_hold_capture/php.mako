%if mode == 'definition':
Balanced\CardHold->capture();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$hold = Balanced\CardHold::get("/card_holds/HL3sDehUAYKyDUk6Dq8naDv7");
$hold->capture();

?>
%endif
%if mode == 'definition':
Balanced\CardHold->void()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$hold = Balanced\CardHold::get("/card_holds/HL3A8udD8N0iDs6u3M6RBctD");
$hold->void();

?>
%endif
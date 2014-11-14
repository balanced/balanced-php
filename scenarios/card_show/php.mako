%if mode == 'definition':
Balanced\Card::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$card = Balanced\Card::get("/cards/CC2vbVLAMwrNqlLvp3km6hq0");

?>
%endif
%if mode == 'definition':
Balanced\Credit->reverses->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$credit = Balanced\Credit::get("/credits/CR4RZgYRiXQOI8m4U1o8vQUt");
$credit->reversals->create();

?>
%endif
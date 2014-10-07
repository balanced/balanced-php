%if mode == 'definition':
Balanced\Reversal::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

Balanced\Reversal::get("/reversals/RV4SFRwPUB4d0wNKELBu9mms");

?>
%endif
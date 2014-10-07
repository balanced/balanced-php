%if mode == 'definition':
Balanced\Card->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$card = Balanced\Card::get("/cards/CC3KykwD9fCcY10zNx28tJrG");
$card->associateToCustomer("/customers/CU3hKsZgnr26YSfwWrGFehna");

?>
%endif
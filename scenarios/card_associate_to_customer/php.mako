%if mode == 'definition':
Balanced\Card->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$card = Balanced\Card::get("/cards/CC3yyHvHx0IkXJa7oxUUHxc6");
$card->associateToCustomer("/customers/CU3veCwC1nqk9GV6dfSkRHRS");

?>
%endif
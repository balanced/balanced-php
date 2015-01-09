%if mode == 'definition':
Balanced\Account->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$payable_account = Balanced\Account::get("/accounts/AT3ogJE07IErLJYR510QO6sM");
$payable_account->credits->create(array(
"amount" => 1000,
"appears_on_statement_as" => "ThingsCo",
"description" => "A simple credit",
"order" => "/orders/OR3vURGwVtqDnnkRS9fgH41G",
"meta" => array(
"rating" => "8",
)
));


?>
%endif
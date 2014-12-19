%if mode == 'definition':
Balanced\Account->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$payable_account = Balanced\Account::get("");
$payable_account->credits->create(array(
    "amount" => "1000",
    "appears_on_statement_as" => "ThingsCo",
    "description" => "A simple credit",
    "meta" => "Array",
    "order" => "/orders/OR2JfBYxYlDAF3L48u9DtIEU",
));

?>
%endif
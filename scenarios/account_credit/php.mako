%if mode == 'definition':
Balanced\Account->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$payable_account = Balanced\Account::get("/accounts/AT43cMKrvwKEJnV5qX8wCqY0");
$payable_account->credits->create(array(
    "amount" => "1000",
    "appears_on_statement_as" => "ThingsCo",
    "description" => "A simple credit",
    "meta" => "Array",
    "order" => "/orders/OR483MoeOnJEXwkxqoPdnDF3",
));

?>
%endif
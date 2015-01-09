%if mode == 'definition':
Balanced\Account->settlements->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$account = Balanced\Account::get("/accounts/AT3ogJE07IErLJYR510QO6sM");
$account->settlements->create(array(
    "appears_on_statement_as" => "ThingsCo",
    "description" => "Payout A",
    "funding_instrument" => "/bank_accounts/BA45anEaEr8g0lOhzhcE9VAN",
    "meta" => array(
        "group" => "alpha",
    )
));

?>
%endif
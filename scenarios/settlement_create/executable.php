<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$account = Balanced\Account::get("/accounts/AT43cMKrvwKEJnV5qX8wCqY0");
$account->settlements->create(array(
    "appears_on_statement_as" => "ThingsCo",
    "description" => "Payout A",
    "funding_instrument" => "/bank_accounts/BA4UZsYXpf2BX97v5WPaT57O",
    "meta" => "Array",
));

?>
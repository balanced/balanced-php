<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$customer = Balanced\Customer::get("/v1/customers/AC409QdTzeeIDJ2rVkxySQfJ");
$customer->debit(
    "5000",
    "Statement text",
    null,
    "Some descriptive text for the debit in the dashboard"
);

?>
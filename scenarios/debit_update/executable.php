<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/debits/WD7FdeaD0Zh9x6hZMpd5fstW");
$debit->description = "New description for debit";
$debit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$debit->save();

?>
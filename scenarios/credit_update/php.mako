%if mode == 'definition':
Balanced\Credit->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$credit = Balanced\Credit::get("/credits/CR4RdgCoOqYhr4sjPdcDjf3T");
$credit->description = 'New description for credit';
$credit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$credit->save();

?>
%endif
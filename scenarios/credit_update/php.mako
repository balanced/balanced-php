%if mode == 'definition':
Balanced\Credit->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$credit = Balanced\Credit::get("/credits/CR63lfosmGuD9LlV7hGlBZYx");
$credit->description = 'New description for credit';
$credit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$credit->save();

?>
%endif
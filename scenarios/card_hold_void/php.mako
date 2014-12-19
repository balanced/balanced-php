%if mode == 'definition':
Balanced\CardHold->void()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$hold = Balanced\CardHold::get("/card_holds/HL5usZqQ94C25Cv0kmFDJYZD");
$hold->void();

?>
%endif
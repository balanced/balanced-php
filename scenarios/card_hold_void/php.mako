%if mode == 'definition':
Balanced\CardHold->void()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$hold = Balanced\CardHold::get("/card_holds/HL4u4T2877PfgYwnbhD2XweV");
$hold->void();

?>
%endif
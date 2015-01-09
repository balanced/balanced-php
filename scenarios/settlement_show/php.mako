%if mode == 'definition':
Balanced\Settlements::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$settlement = Balanced\Settlements::get("/settlements/ST6HmBuLJSEa82oUwId1AShW");

?>
%endif
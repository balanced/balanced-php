%if mode == 'definition':
Balanced\Credit->reversals->create()


% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$credit = Balanced\Credit::get("/credits/CR6zeufmfv0u1KHrUBCQtAgU");
$credit->reversals->create();

?>
%endif
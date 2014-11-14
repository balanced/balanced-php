%if mode == 'definition':
Balanced\Debit::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$debit = Balanced\Debit::get("/debits/WD366ydsunkOBVEgGot9ReFi");

?>
%endif
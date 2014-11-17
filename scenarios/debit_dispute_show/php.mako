%if mode == 'definition':
Balanced\Debit()->dispute

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$debit = Balanced\Debit::get("/debits/WD4xfFIxpeQpeRHm55Qc2xV3");
$dispute = $debit->dispute;

?>
%endif
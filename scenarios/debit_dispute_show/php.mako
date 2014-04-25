%if mode == 'definition':
Balanced\Debit()->dispute

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$debit = Balanced\Debit::get("/debits/WD4YCKAyFrQBFYuFCUCRynOx");
$dispute = $debit->dispute;

?>
%endif
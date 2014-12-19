%if mode == 'definition':
Balanced\Debit()->dispute

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$debit = Balanced\Debit::get("/debits/WD6NY7W6uBFngNyBLqyhPBPv");
$dispute = $debit->dispute;

?>
%endif
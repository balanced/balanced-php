%if mode == 'definition':
Balanced\Debit()->dispute

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$debit = Balanced\Debit::get("/debits/WD4QE0i532v0eWQ6mCWCASc5");
$dispute = $debit->dispute;

?>
%endif
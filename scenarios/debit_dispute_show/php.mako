%if mode == 'definition':
Balanced\Debit()->dispute

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$debit = Balanced\Debit::get("/debits/WD4lWzGqJZFS4UjyhWOGwiQ5");
$dispute = $debit->dispute;

?>
%endif
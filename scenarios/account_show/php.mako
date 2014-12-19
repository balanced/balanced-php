%if mode == 'definition':
Balanced\Account::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$account = Balanced\Account::get("/accounts/AT2t2NS6otEMnPT0jVuRAE6Y");

?>
%endif
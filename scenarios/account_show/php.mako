%if mode == 'definition':
Balanced\Account::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$account = Balanced\Account::get("/accounts/AT2V7l4MoUJH8xDse641Xqog");

?>
%endif
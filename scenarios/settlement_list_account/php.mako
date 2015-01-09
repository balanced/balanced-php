%if mode == 'definition':
Balanced\Account->settlements->query()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$account = Balanced\Account::get("/accounts/AT2E6Ju62P9AnTJwe0fL5kOI");
$settlements = $account->settlements->query()->all();

?>
%endif
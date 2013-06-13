% if mode == 'definition':
Balanced\Verification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$verification = Balanced\Verification::get("/v1/bank_accounts/BA6joBOllXBzGbYKpa4PCiGQ/verifications/BZ6kgUuE7JInbXvZLxJqMqnR");
$verification.amount_1 = 1;
$verification.amount_2 = 1;
$verification->save();
% endif
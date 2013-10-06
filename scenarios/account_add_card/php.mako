%if mode == 'definition':
\Balanced\Account->addCard();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/accounts/CU5U8N8xXdkTgLmmV3wSozLc");
$account->addCard("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/cards/CC5WUKAGJIemxz0Bd7AJ8Lxu");

?>
%endif
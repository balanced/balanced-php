%if mode == 'definition':
Balanced\BankAccountVerification::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$verification = Balanced\BankAccountVerification::get("/verifications/BZ1eMAsKt13lIj2SkvvHlxfT");

?>
%endif
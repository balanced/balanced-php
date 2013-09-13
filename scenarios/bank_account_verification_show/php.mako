%if mode == 'definition':
Balanced\BankAccountVerification::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA2qqf5Ql8p17o1mGZst8pxu/verifications/BZ2sdvKo5abzAg1X34BqPZDx");

?>
%endif
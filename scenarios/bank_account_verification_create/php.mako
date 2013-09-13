%if mode == 'definition':
\Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("/v1/bank_accounts/BA2mKpsgu8Ev9tz6VyckqOyQ");
$verification = $bank_account->verify();

?>
%endif
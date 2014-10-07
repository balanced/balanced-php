%if mode == 'definition':
\Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA2TmACICKF9Lah8tzHWpLEx");
$verification = $bank_account->verify();

?>
%endif
%if mode == 'definition':
Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA6nZLdijPKzQ8RhJNnN1OD6/verifications/BZ6s3ghAmwY5BhnJIrCKSkUo");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>
%endif
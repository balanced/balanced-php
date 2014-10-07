%if mode == 'definition':
Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$verification = Balanced\BankAccountVerification::get("/verifications/BZ36l7ap1haTpY5Pby42g69q");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>
%endif
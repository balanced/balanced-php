%if mode == 'definition':
Balanced\Errors\InvalidRoutingNumber

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$bank_account = new Balanced\BankAccount(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "100000007",
    "type" => "checking",
));
try {
    $bank_account->save();
}
catch(Balanced\Errors\InvalidRoutingNumber $e) {
  // handle error here
}

?>
%endif
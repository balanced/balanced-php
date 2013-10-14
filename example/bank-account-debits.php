<?php
//
// Create, verify, and debit a bank account.
//

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

// Create a new marketplace
$key = new Balanced\APIKey();
$key->save();
Balanced\Settings::$api_key = $key->secret;
$marketplace = new Balanced\Marketplace();
$marketplace->save();

// Create a bank account
$bank_account = new \Balanced\BankAccount(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
));
$bank_account->save();
print "The BankAccount: " . $bank_account->uri;

// Create a Customer
$customer = new \Balanced\Customer(array(
  "name" => "William Henry Cavendish III",
  "email" => "william@example.com",
));
$customer->save();

// Add the bank account to the Customer
$customer->addBankAccount($bank_account);

print("You can't debit from a bank account until you verify it\n");
try {
    $customer->debit(100);
} catch (Exception $e) {
    printf("Debit failed, %s\n", $e->description);
}

// Initiate a bank account verification
$verification = $bank_account->verify();

// Verify the bank account
try {
    $verification->confirm(1, 2);
} catch (Balanced\Errors\BankAccountVerificationFailure $e) {
    printf("Verification error , %s\n", $e->description);
    print("PROTIP: for TEST bank accounts the valid amount is always 1 and 1\n");
}

$verification->confirm(1, 1);

$debit = $customer->debit(100);
printf("Debited the bank account %s for %d cents\n",
    $debit->source->uri,
    $debit->amount
);


?>

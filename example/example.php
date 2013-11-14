<?php

require(__DIR__ . "/../vendor/autoload.php");

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

// Create new API key
print "Create a new API key\n";
$key = new Balanced\APIKey();
$key->save();
print "Our secret is " . $key->secret . "\n";

// Configure with new API key
print "Configure with API key secret " . $key->secret . "\n";
Balanced\Settings::$api_key = $key->secret;

// Create Marketplace for new API key
print "Create a marketplace for the new API key secret\n";
$marketplace = new Balanced\Marketplace();
$marketplace->save();

// Marketplace
print "Balanced\Marketplace::mine(): " . Balanced\Marketplace::mine()->uri . "\n";
print "Marketplace name: " . $marketplace->name . "\n";
print "Changing marketplace name to TestFooey\n";
$marketplace->name = "TestFooey";
$marketplace->save();
print "Marketplace name is now " . $marketplace->name . "\n";

if ($marketplace->name != "TestFooey") {
   throw new Exception("Marketplace name is NOT TestFooey");
}

/*
$API_KEY_SECRET = 'aac82f320b7c11e39b09026ba7cac9da';
Balanced\Settings::$api_key = $API_KEY_SECRET;
$marketplace = Balanced\Marketplace::mine();
*/

// Create a Card
print "Create a card\n";
$card = $marketplace->cards->create(array(
      "card_number" => "5105105105105100", 
      "expiration_month" => "12",
      "expiration_year" => "2015"
));
print "The card: " . $card->uri . "\n";

// Create a Customer
$customer = new \Balanced\Customer(array(
  "name" => "William Henry Cavendish III",
  "email" => "william@example.com"
));
$customer->save();
print "The customer: " . $customer->uri . "\n";

// Add Card to Customer
$customer->addCard($card->uri);

// Hold some funds
print "Create a Hold for some funds, $15\n";
$hold = $marketplace->holds->create(array(
  "amount" => 1500,
  "description" => "Some descriptive text for the debit in the dashboard",
  "source_uri" => $card->uri
));

// Capture the hold
print "Capture the Hold (for the full amount)\n";
$debit = $hold->capture();

// Check escrow for new funds from debit
$marketplace = Balanced\Marketplace::mine();
if ($marketplace->in_escrow != 1500) {
   throw new Exception("1500 is not in escrow! This is wrong");
}
print "Escrow amount: " . $marketplace->in_escrow . " \n";

print "Refund the full amount\n";
$refund = $debit->refund();

// Create a bank account
$bank_account = new \Balanced\BankAccount(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
));
$bank_account->save();

// Create a Customer who is the seller
$seller = new \Balanced\Customer(array(
  "name" => "Billy Jones",
  "email" => "william@example.com",
  "street_address" => "801 High St",
  "postal_code" => "94301",
  "country" => "USA",
  "dob" => "1979-02"
));
$seller->save();

// Add bank account to seller
$seller->addBankAccount($bank_account->uri);

print "Debit the customer for $130\n";
$debit = $customer->debit(13000, "MARKETPLACE.COM");

print "Credit the seller $110\n";
$credit = $seller->credit(11000, "Buyer purchased something on Marketplace.com");

print "The marketplace charges 15%, so it earned $20\n";
$mp_credit = $marketplace->owner_customer->credit(2000,
	   "Commission from MARKETPLACE.COM");

?>

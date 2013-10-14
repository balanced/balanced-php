<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

$API_KEY_SECRET = '5f4db668a5ec11e1b908026ba7e239a9';
Balanced\Settings::$api_key = $API_KEY_SECRET;
$marketplace = Balanced\Marketplace::mine();

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

// Add the Card to the Customer
print "Add the Card to the Customer\n";
$customer->addCard($card->uri);

// Debit the Customer
print "Debit the customer $15\n";
try {
    $debit = $customer->debit(1500);
    print "The debit: " . $debit->uri . "\n";
    print "Debited Customer " . $customer->uri . " for " . $debit->amount . " cents.\n";
}
catch (Balanced\Errors\Declined $e) {
    print "Oh no, the processor declined the debit!\n";
}
catch (Balanced\Errors\NoFundingSource $e) {
    print "Oh no, the buyer has not active funding sources!\n";
}
catch (Balanced\Errors\CannotDebit $e) {
    print "Oh no, the buyer has no debitable funding sources!\n";
}


?>
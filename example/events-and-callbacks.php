<?php
/*
 * Create a callback and handle events
*/
require(__DIR__ . "/vendor/autoload.php");

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

// Create a new marketplace
$key = new Balanced\APIKey();
$key->save();
Balanced\Settings::$api_key = $key->secret;
$marketplace = new Balanced\Marketplace();
$marketplace->save();

// Create a requestb.in
$ch = curl_init("http://requestb.in/api/v1/bins");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . 0)
);
$result = json_decode(curl_exec($ch));
$bin_name = $result->name;
$callback_url = "http://requestb.in/" . $bin_name;
$requests_url = "http://requestb.in/api/v1/bins/" . $bin_name . "/requests";

// Create a Callback
printf("Create a callback\n");
$callback = new Balanced\Callback(array(
  "url" => $callback_url
));
$callback->save();
print "The callback: " . $callback->uri . "\n";

// Create a Customer
$customer = new \Balanced\Customer(array(
  "name" => "William Henry Cavendish III",
  "email" => "william@example.com"
));
$customer->save();
print "The customer: " . $customer->uri . "\n";

// Create a Card
printf("Create a Card\n");
$card = $marketplace->cards->create(array(
    "card_number" => "5105105105105100",
    "expiration_month" => "12",
    "expiration_year" => "2015"
));

// Add Card to Customer
print "Add Card to Customer\n";
$customer->addCard($card->uri);

// Debit the Customer
printf("Create a debit (which implicitly creates and captures a hold)\n");
$customer->debit(100);

foreach ($marketplace->events as $event) {
    printf("Received Event:\n Type - %s\n Occurred at - %s\n\n",
        $event->type,
        $event->occurred_at
    );
}

printf("Examine event payloads at http://requestb.in/%s?inspect\n",
    $bin_name
);

?>

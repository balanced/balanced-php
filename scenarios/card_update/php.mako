%if mode == 'definition':
Balanced\Card->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$card = Balanced\Card::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/cards/CC6NiW8huZV4AxYTDJsjOd7k");
$card->meta = array(
    "facebook.user_id" => "0192837465",
    "my-own-customer-id" => "12345",
    "twitter.id" => "1234987650",
);
$card->save();

?>
%endif
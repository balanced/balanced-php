%if mode == 'definition':
Balanced\Card->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$card = Balanced\Card::get("/cards/CC4mYF7dj7X6OA2K5F0Qyb4N");
$card->meta = array(
    "facebook.user_id" => "0192837465",
    "my-own-customer-id" => "12345",
    "twitter.id" => "1234987650",
);
$card->save();

?>
%endif
%if mode == 'definition':
Balanced\Card->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$card = Balanced\Card::get("/cards/CC33DRVrekWpiHYjxSdVuqWc");
$card->meta = array(
    "facebook.user_id" => "0192837465",
    "my-own-customer-id" => "12345",
    "twitter.id" => "1234987650",
);
$card->save();

?>
%endif
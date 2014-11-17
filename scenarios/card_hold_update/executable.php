<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$hold = Balanced\Hold::get("/card_holds/HL2F8jlnySjVKidwfXgBYZMY");
$hold->description = 'update this description';
$hold->meta = array(
    "holding.for" => "user1",
    "meaningful.key" => "some.value",
);
$hold->save();

?>
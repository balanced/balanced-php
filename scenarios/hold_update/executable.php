<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$hold = Balanced\Hold::get("/v1/marketplaces/TEST-MP20QSIx33BcCbLmSfH5uFTA/holds/HL3N2sk2FHdZFsUT40fZjSUg");
$hold->description = "update this description";
$hold->meta = array(
    "holding.for" => "user1",
    "meaningful.key" => "some.value",
);
$hold->save();

?>
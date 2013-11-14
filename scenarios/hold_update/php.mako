%if mode == 'definition':
Balanced\Hold->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$hold = Balanced\Hold::get("/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/holds/HL74dRg2HWc5vQwX0kQ9XQfM");
$hold->description = "update this description";
$hold->meta = array(
    "holding.for" => "user1",
    "meaningful.key" => "some.value",
);
$hold->save();

?>
%endif
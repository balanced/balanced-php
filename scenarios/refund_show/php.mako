%if mode == 'definition':
Balanced\Refund::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$refund = Balanced\Refund::get("/refunds/RF5OXw4w1a9g2GsPqQ2Hg9hj");

?>
%endif
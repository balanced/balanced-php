%if mode == 'definition':
Balanced\Callback->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$callback = \Balanced\Callback::get("/v1/callbacks/CB5GFgGfugkhbKueLUJL6hAa");
$callback->unstore();

?>
%endif
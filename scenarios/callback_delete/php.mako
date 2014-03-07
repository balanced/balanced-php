%if mode == 'definition':
Balanced\Callback->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$callback = \Balanced\Callback::get("/callbacks/CB2UgKCxIYwn8tV5kSS7LRAS");
$callback->unstore();

?>
%endif
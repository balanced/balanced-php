%if mode == 'definition':
\Balanced\Callback()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$callback = new Balanced\Callback(array(
  "url" => "http://www.example.com/callback_test"
));
$callback->save();

?>
%endif
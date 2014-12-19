%if mode == 'definition':
\Balanced\Callback()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$callback = new Balanced\Callback(array(
  "url" => "http://www.example.com/callback"
));
$callback->save();

?>
%endif